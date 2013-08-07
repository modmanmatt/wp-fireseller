<?php
/**
 * ListingsModel class
 *
 * responsible for managing listings and talking to ebay
 * 
 */

class ListingsModel extends WPL_Model {

	var $_session;
	var $_cs;

	function ListingsModel()
	{
		global $wpl_logger;
		$this->logger = &$wpl_logger;

		global $wpdb;
		$this->tablename = $wpdb->prefix . 'ebay_auctions';
	}


	function getPageItems( $current_page, $per_page ) {
		global $wpdb;

        $orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'id'; //If no sort, default to title
        $order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'desc'; //If no order, default to asc
        $offset = ( $current_page - 1 ) * $per_page;

        $join_sql  = '';
        $where_sql = '';

        // filter listing_status
		$listing_status = ( isset($_REQUEST['listing_status']) ? $_REQUEST['listing_status'] : 'all');
		if ( $listing_status != 'all' ) {
			$where_sql = "WHERE status = '".$listing_status."'";
		} 

        // filter search_query
		$search_query = ( isset($_REQUEST['s']) ? $_REQUEST['s'] : false);
		if ( $search_query ) {
			$join_sql = "
				LEFT JOIN {$wpdb->prefix}ebay_profiles p  ON l.profile_id =  p.profile_id
				LEFT JOIN {$wpdb->prefix}postmeta      pm ON l.post_id    = pm.post_id AND pm.meta_key = '_sku'
			";
			$where_sql = "
				WHERE l.auction_title LIKE '%".$search_query."%'
				    OR l.template     LIKE '%".$search_query."%'
				    OR p.profile_name LIKE '%".$search_query."%'
					OR l.ebay_id          = '".$search_query."'
					OR l.auction_type     = '".$search_query."'
					OR l.listing_duration = '".$search_query."'
					OR l.status           = '".$search_query."'
					OR l.post_id          = '".$search_query."'
					OR pm.meta_value      = '".$search_query."'
			";
		} 


        // get items
		$items = $wpdb->get_results("
			SELECT *
			FROM $this->tablename l
            $join_sql 
            $where_sql
			ORDER BY $orderby $order
            LIMIT $offset, $per_page
		", ARRAY_A);

		// get total items count - if needed
		if ( ( $current_page == 1 ) && ( count( $items ) < $per_page ) ) {
			$this->total_items = count( $items );
		} else {
			$this->total_items = $wpdb->get_var("
				SELECT COUNT(*)
				FROM $this->tablename l
	            $join_sql
	            $where_sql
				ORDER BY $orderby $order
			");			
		}

		return $items;
	}



	/* the following methods could go into another class, since they use wpdb instead of EbatNs_DatabaseProvider */

	function getAll() {
		global $wpdb;
		$items = $wpdb->get_results("
			SELECT *
			FROM $this->tablename
			ORDER BY id DESC
		", ARRAY_A);

		return $items;
	}

	function getItem( $id ) {
		global $wpdb;
		$item = $wpdb->get_row("
			SELECT *
			FROM $this->tablename
			WHERE id = '$id'
		", ARRAY_A);

		if ( !empty($item) ) $item['profile_data'] = $this->decodeObject( $item['profile_data'], true );
		// $item['details'] = $this->decodeObject( $item['details'] );

		return $item;
	}

	function deleteItem( $id ) {
		global $wpdb;
		$wpdb->query("
			DELETE
			FROM $this->tablename
			WHERE id = '$id'
		");
	}

	function getItemByEbayID( $id, $decode_details = true ) {
		global $wpdb;
		$item = $wpdb->get_row("
			SELECT *
			FROM $this->tablename
			WHERE ebay_id = '$id'
		");
		if (!$item) return false;
		if (!$decode_details) return $item;

		$item->profile_data = $this->decodeObject( $item->profile_data, true );
		$item->details = $this->decodeObject( $item->details );

		return $item;
	}

	function getTitleFromItemID( $id ) {
		global $wpdb;
		$item = $wpdb->get_var("
			SELECT auction_title
			FROM $this->tablename
			WHERE ebay_id = '$id'
		");
		return $item;
	}

	function getEbayIDFromID( $id ) {
		global $wpdb;
		$item = $wpdb->get_var("
			SELECT ebay_id
			FROM $this->tablename
			WHERE id = '$id'
		");
		return $item;
	}
	function getEbayIDFromPostID( $post_id ) {
		global $wpdb;
		$item = $wpdb->get_var("
			SELECT ebay_id
			FROM $this->tablename
			WHERE post_id = '$post_id'
		");
		return $item;
	}
	function getStatus( $id ) {
		global $wpdb;
		$item = $wpdb->get_var("
			SELECT status
			FROM $this->tablename
			WHERE id = '$id'
		");
		return $item;
	}
	function getStatusFromPostID( $post_id ) {
		global $wpdb;
		$item = $wpdb->get_var("
			SELECT status
			FROM $this->tablename
			WHERE post_id = '$post_id'
			ORDER BY id DESC
		");
		return $item;
	}
	function getListingIDFromPostID( $post_id ) {
		global $wpdb;
		$item = $wpdb->get_var("
			SELECT id
			FROM $this->tablename
			WHERE post_id = '$post_id'
			ORDER BY id DESC
		");
		return $item;
	}
	function getAllListingsFromPostID( $post_id ) {
		global $wpdb;
		$items = $wpdb->get_results("
			SELECT *
			FROM $this->tablename
			WHERE post_id = '$post_id'
			ORDER BY id DESC
		");
		return $items;
	}
	function getViewItemURLFromPostID( $post_id ) {
		global $wpdb;
		$item = $wpdb->get_var("
			SELECT ViewItemURL
			FROM $this->tablename
			WHERE post_id = '$post_id'
			ORDER BY id DESC
		");
		return $item;
	}

	function getStatusSummary() {
		global $wpdb;
		$result = $wpdb->get_results("
			SELECT status, count(*) as total
			FROM $this->tablename
			GROUP BY status
		");

		$summary = new stdClass();
		// $summary->prepared = false;
		// $summary->changed = false;
		foreach ($result as $row) {
			$status = $row->status;
			$summary->$status = $row->total;
		}

		// count total items as well
		$total_items = $wpdb->get_var("
			SELECT COUNT( id ) AS total_items
			FROM $this->tablename
		");
		$summary->total_items = $total_items;

		return $summary;
	}

	function getHistory( $ebay_id ) {
		global $wpdb;
		$item = $wpdb->get_var("
			SELECT history
			FROM $this->tablename
			WHERE ebay_id = '$ebay_id'
		");
		return maybe_unserialize( $item );
	}

	function setHistory( $ebay_id, $history ) {
		global $wpdb;

		$data = array( 
			'history' => maybe_serialize( $history )
		);

		$result = $wpdb->update( $this->tablename, $data, array( 'ebay_id' => $ebay_id ) );
		return $result;
	}

	function addItemIdToHistory( $ebay_id, $previous_id ) {
		global $wpdb;
	
		$history = $this->getHistory( $ebay_id );

		$this->logger->info( "addItemIdToHistory($ebay_id, $previous_id) " );
		$this->logger->info( "history: ".print_r($history,1) );

		// init empty history
		if ( ! isset($history['previous_ids'] ) ) {
			$history = array(
				'previous_ids' => array()
			);
		}

		// return if ID already exists in history
		if ( in_array( $previous_id, $history['previous_ids'] ) ) return;

		// add ID to history
		$history['previous_ids'][] = $previous_id;		

		// update history
		$this->setHistory( $ebay_id, $history );

	}


	function isUsingEPS( $id ) {
		$this->logger->info( "isUsingEPS( $id ) " );

		$listing_item = $this->getItem( $id );
		$profile_details = $listing_item['profile_data']['details'];

        $with_additional_images = isset( $profile_details['with_additional_images'] ) ? $profile_details['with_additional_images'] : false;
        if ( $with_additional_images == '0' ) $with_additional_images = false;

        return $with_additional_images;
	}


	## BEGIN PRO ##

	function filterPurchasedItemsForRevision( $items ) {
		// $this->logger->info( "filterPurchasedItemsForRevision() ".print_r($items,1) );

		// loop trough product ids and build new array
		$items_to_revise = array();
		foreach ($items as $post_id) {
			
			// get listing id
			$listing_id = $this->getListingIDFromPostID( $post_id);
			if ( intval( $listing_id) == 0) continue;

			// get listing item
			$listing_item = $this->getItem( $listing_id);

			// skip if profile quantity override effective
			if ( @$listing_item['profile_data']['quantity'] != '' ) continue;

			// update listing stock for non variations
			// if ( ! ProductWrapper::hasVariations( $post_id ) ) {
	
			// 	$new_stock = ProductWrapper::getStock( $post_id );
			// 	$this->setListingQuantity( $listing_id, $new_stock );
			// 	$this->logger->info( "setListingQuantity() ".print_r($new_stock,1) );

			// }

			// check status
			$status = $this->getStatus( $listing_id );
			if ( ( $status == 'published' ) || ( $status == 'changed' ) ) {
				$items_to_revise[] = $listing_id;
			}

		}
		return $items_to_revise;
	}


	function uploadPictureToEPS( $url, $listing_id, $session ) {

		// preparation - set up new ServiceProxy with given session
		$this->initServiceProxy($session);

		// preprocess url
		if ( ! $url ) return null;
		// $url = str_replace(' ', '%20', $url );

		// urlencode filename only
		$url = str_replace( basename($url), urlencode( basename($url) ), $url );

		// check EPS cache before upload
		$listing = $this->getItem( $listing_id );
		if ( ! $uploaded_images = maybe_unserialize( $listing['eps'] ) ) $uploaded_images = array();

		// debug
		// $this->logger->info( "loaded EPS cache for listing $listing_id: ".print_r($uploaded_images,1) );
		// $this->logger->info( "raw EPS cache for listing $listing_id: ".print_r($listing['eps'],1) );

		foreach ($uploaded_images as $img) {
			if ( $img->local_url == $url ) {
				$this->logger->info( "found cached EPS image for $url" );
				$this->logger->info( "using cached EPS image: ".$img->remote_url );
				return $img->remote_url;
			}
		}

		$req = new UploadSiteHostedPicturesRequestType();
        $req->setExternalPictureURL( $url );
		$req->setPictureSet( 'Supersize' );

		# http://www.intradesys.com/de/forum/1496       
		// $req = new UploadSiteHostedPicturesRequestType();
		// $req->setPictureSet( 'Standard' );
		// $req->setPictureName( 'MyPic' );
		// $req->setPictureData(file_get_contents($url));

		$this->logger->info( "calling UploadSiteHostedPictures - $url " );
		$this->logger->debug( "Request: ".print_r($req,1) );
		// $res = $this->_cs->UploadSiteHostedPictures($req); 
		$res = $this->callUploadSiteHostedPictures($req, $session ); 
		$this->logger->info( "UploadSiteHostedPictures Complete" );
		$this->logger->info( "Response: ".print_r($res,1) );

		// handle response and check if successful
		if ( $this->handleResponse($res) ) {

			// fetch final url
			$eps_url = $res->SiteHostedPictureDetails->FullURL;
			
			$this->logger->info( "image was uploaded to EPS successfully. " );

			// create cache object
			$img = new stdClass();
			$img->local_url     = $url;
			$img->remote_url    = $eps_url;
			$img->use_by_date   = $res->SiteHostedPictureDetails->UseByDate;
			$img->uploaded_date = time();
			$uploaded_images[]  = $img;

			// update EPS cache 
			global $wpdb;
			$wpdb->update( 	$this->tablename, 
							array( 'eps' => serialize( $uploaded_images ) ), 
							array( 'id' => $listing_id ) );

			return $eps_url;

		} // call successful

		return false;

	}


	function callUploadSiteHostedPictures( $request, $session, $parseMode = EBATNS_PARSEMODE_CALL )
	{

		$this->_session = $session;
		// $this->_session->ReadTokenFile();
		$userToken = $this->_session->getRequestToken();
		$version = $this->_cs->getVersion();
		$ExternalPictureURL = $request->getExternalPictureURL();

	    ///Build the request XML request which is first part of multi-part POST
	    $xmlReq = '<?xml version="1.0" encoding="utf-8"?>' . "\n";
	    $xmlReq .= '<UploadSiteHostedPicturesRequest xmlns="urn:ebay:apis:eBLBaseComponents">' . "\n";
	    $xmlReq .= "<Version>$version</Version>\n";
	    $xmlReq .= "<ExternalPictureURL>$ExternalPictureURL</ExternalPictureURL>\n";    
	    $xmlReq .= "<PictureSet>Supersize</PictureSet>\n";    
	    $xmlReq .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>\n";
	    $xmlReq .= '</UploadSiteHostedPicturesRequest>';

		// place all data into theirs header
		$reqHeaders[] = 'X-EBAY-API-COMPATIBILITY-LEVEL: ' . $version;
		$reqHeaders[] = 'X-EBAY-API-DEV-NAME: ' . $this->_session->getDevId();
		$reqHeaders[] = 'X-EBAY-API-APP-NAME: ' . $this->_session->getAppId();
		$reqHeaders[] = 'X-EBAY-API-CERT-NAME: ' . $this->_session->getCertId();
		$reqHeaders[] = 'X-EBAY-API-CALL-NAME: ' . 'UploadSiteHostedPictures';
		$reqHeaders[] = 'X-EBAY-API-SITEID: ' . $this->_session->getSiteId();		
		$multiPartData = null;

		// echo "<pre>";print_r($request);#die();		
		// $body = $this->encodeMessageXmlStyle( $method, $request );
		// echo "<pre>";echo htmlspecialchars($body);die();				

		// $message = '<?xml version="1.0" encoding="utf-8"?---*-->' . "\n";
		// $message .= $body;
		$message = $xmlReq;
		
		// we support only Sandbox and Production here !
		if ($this->_session->getAppMode() == 1)
			$this->_ep = "https://api.sandbox.ebay.com/ws/api.dll";
		else
			$this->_ep = 'https://api.ebay.com/ws/api.dll';
		$this->_ep .= '?callname=' . 'UploadSiteHostedPictures';
		$this->_ep .= '&version=' . $version;

		// echo "<pre>";echo htmlspecialchars($message);die();		
				
		// $responseMsg = $this->_cs->sendMessageXmlStyle( $message, $reqHeaders, $multiPartData );
		$responseMsg = $this->sendMessageXmlStyle( $message, $reqHeaders, $multiPartData );
		// echo "<pre>";print_r($responseMsg);#die();				

		if ( $responseMsg )	{

			// $this->_cs->_startTp('Decoding SOAP Message');
			$ret = & $this->_cs->decodeMessage( 'UploadSiteHostedPictures', $responseMsg, $parseMode );
			// $this->_cs->_stopTp('Decoding SOAP Message');

		} else {
			$ret = & $this->_currentResult;
		}
		
		return $ret;
	}
	

	// sendMessage in XmlStyle,
	// the only difference is the extra headers we use here
	function sendMessageXmlStyle( $message, $extraXmlHeaders, $multiPartImageData = null )
	{
		$this->_currentResult = null;
		$this->_cs->log( $this->_ep, 'RequestUrl' );
		$this->_cs->logXml( $message, 'Request' );
		
		// $timeout = $this->_cs->_transportOptions['HTTP_TIMEOUT'];
		// if (!$timeout || $timeout <= 0)
		// 	$timeout = 300;
		$timeout = 30;

		
		$ch = curl_init();
		
		if ($multiPartImageData !== null)
		{
			$boundary = "MIME_boundary";
			
			$CRLF = "\r\n";
			
			$mp_message .= "--" . $boundary . $CRLF;
			$mp_message .= 'Content-Disposition: form-data; name="XML Payload"' . $CRLF;
			$mp_message .= 'Content-Type: text/xml;charset=utf-8' . $CRLF . $CRLF;
			$mp_message .= $message;
			$mp_message .= $CRLF;
			
			$mp_message .= "--" . $boundary . $CRLF;
			$mp_message .= 'Content-Disposition: form-data; name="dumy"; filename="dummy"' . $CRLF;
			$mp_message .= "Content-Transfer-Encoding: binary" . $CRLF;
			$mp_message .= "Content-Type: application/octet-stream" . $CRLF . $CRLF;
			$mp_message .= $multiPartImageData;
			
			$mp_message .= $CRLF;
			$mp_message .= "--" . $boundary . "--" . $CRLF;
			
			$message = $mp_message;
			
			$reqHeaders[] = 'Content-Type: multipart/form-data; boundary=' . $boundary;
			$reqHeaders[] = 'Content-Length: ' . strlen($message);
		}
		else
		{
			$reqHeaders[] = 'Content-Type: text/xml;charset=utf-8';
		}
		
		
		// if ($this->_cs->_transportOptions['HTTP_COMPRESS'])
		// {
		// 	$reqHeaders[] = 'Accept-Encoding: gzip, deflate';
		// 	curl_setopt( $ch, CURLOPT_ENCODING, "gzip");
		// 	curl_setopt( $ch, CURLOPT_ENCODING, "deflate");
		// }
		
		if (is_array($extraXmlHeaders))
			$reqHeaders = array_merge((array)$reqHeaders, $extraXmlHeaders);
		
		curl_setopt( $ch, CURLOPT_URL, $this->_ep );
		
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
		
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $reqHeaders );
		curl_setopt( $ch, CURLOPT_USERAGENT, 'ebatns;xmlstyle;1.0' );
		curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
		
		curl_setopt( $ch, CURLOPT_POST, 1 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $message );
		
		curl_setopt( $ch, CURLOPT_FAILONERROR, 0 );
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_HEADER, 1 );
		curl_setopt( $ch, CURLOPT_HTTP_VERSION, 1 );
		
		// added support for multi-threaded clients
		// if (isset($this->_cs->_transportOptions['HTTP_CURL_MULTITHREADED']))
		// {
		// 	curl_setopt( $ch, CURLOPT_DNS_USE_GLOBAL_CACHE, 0 );
		// }


		$responseRaw = curl_exec( $ch );
		// echo"<pre>";print_r($responseRaw);#die();
		if ( !$responseRaw )
		{
			$this->_currentResult = new EbatNs_ResponseError();
			$this->_currentResult->raise( 'curl_error ' . curl_errno( $ch ) . ' ' . curl_error( $ch ), 80000 + 1, EBAT_SEVERITY_ERROR );
			curl_close( $ch );
			
			return null;
		} 
		else
		{
			curl_close( $ch );
			
			$responseRaw = str_replace
			(
				array
				(
					"HTTP/1.1 100 Continue\r\n\r\nHTTP/1.1 200 OK\r\n",
					"HTTP/1.1 100 Continue\n\nHTTP/1.1 200 OK\n"
				),
				array
				(
					"HTTP/1.1 200 OK\r\n",
					"HTTP/1.1 200 OK\n"
				),
				$responseRaw
			);

			$responseBody = null;
			if ( preg_match( "/^(.*?)\r?\n\r?\n(.*)/s", $responseRaw, $match ) )
			{
				$responseBody = $match[2];
				$headerLines = split( "\r?\n", $match[1] );
				foreach ( $headerLines as $line )
				{
					if ( strpos( $line, ':' ) === false )
					{
						$responseHeaders[0] = $line;
						continue;
					} 
					list( $key, $value ) = split( ':', $line );
					$responseHeaders[strtolower( $key )] = trim( $value );
				} 
			} 
			
			if ($responseBody)
				$this->_cs->logXml( $responseBody, 'Response' );
			else
				$this->_cs->logXml( $responseRaw, 'ResponseRaw' );
		} 
		
		return $responseBody;
	} 



	function SetSellingManagerItemAutomationRule( $ItemID, $profile_details, $session )
	{

		// make sure the required values are defined
		if ( ! $profile_details['AutomatedRelistingRule_Type'] ) return;
		if ( ! $profile_details['AutomatedRelistingRule_RelistCondition'] ) return;

		// build AutomatedRelistingRule
		$AutomatedRelistingRule = new SellingManagerAutoRelistType();
		$AutomatedRelistingRule->setType( $profile_details['AutomatedRelistingRule_Type'] );
		$AutomatedRelistingRule->setRelistCondition( $profile_details['AutomatedRelistingRule_RelistCondition'] );

		if ( intval( $profile_details['RelistAfterDays'] ) > 0 ) {
			$AutomatedRelistingRule->setRelistAfterDays( $profile_details['RelistAfterDays'] );
		}
		if ( intval( $profile_details['RelistAfterHours'] ) > 0 ) {
			$AutomatedRelistingRule->setRelistAfterHours( $profile_details['RelistAfterHours'] );
		}
		if ( intval( $profile_details['RelistAtSpecificTimeOfDay'] ) > 0 ) {
			$AutomatedRelistingRule->setRelistAtSpecificTimeOfDay( $profile_details['RelistAtSpecificTimeOfDay'] );
		}
		if ( intval( $profile_details['ListingHoldInventoryLevel'] ) > 0 ) {
			$AutomatedRelistingRule->setListingHoldInventoryLevel( $profile_details['ListingHoldInventoryLevel'] );
		}


		// preparation - set up new ServiceProxy with given session
		$this->initServiceProxy($session);

		$req = new SetSellingManagerItemAutomationRuleRequestType(); 
		$req->setItemID($ItemID);
		$req->setAutomatedRelistingRule($AutomatedRelistingRule);
		
		$this->logger->debug( "Request: ".print_r($req,1) );
		$res = $this->_cs->SetSellingManagerItemAutomationRule($req); 


		// handle response and check if successful
		if ( $this->handleResponse($res) ) {

			$this->logger->info( "post processing finished on Item #$id - ItemID: ".$res->ItemID );
			$this->logger->info( "Response: ".print_r($res,1) );

		} // call successful

		return $this->result;

	} // addItem()


	## END PRO ##
	
	function listingUsesFixedPriceItem( $listing_item )
	{
		// regard auction_type by default
		$useFixedPriceItem = ( 'FixedPriceItem' == $listing_item['auction_type'] ) ? true : false;

		// but switch to AddItem if BestOffer is enabled
		$profile_details = $listing_item['profile_data']['details'];
        if ( @$profile_details['bestoffer_enabled'] == '1' ) $useFixedPriceItem = false;

		// or switch to AddItem if product level listing type is Chinese
		$product_listing_type = get_post_meta( $listing_item['post_id'], '_ebay_auction_type', true );
        if ( $product_listing_type == 'Chinese' ) $useFixedPriceItem = false;

        // never use FixedPriceItem if variations are disabled
        if ( get_option( 'wplister_disable_variations' ) == '1' ) $useFixedPriceItem = false;

		return $useFixedPriceItem;
	} 

	// handle additional requests after AddItem(), ReviseItem(), etc.
	function postProcessListing( $id, $ItemID, $item, $listing_item, $res, $session ) {
		## BEGIN PRO ##
		$profile_details = $listing_item['profile_data']['details'];

		$this->logger->info( 'postProcessListing() - ItemID: '.$ItemID );
		$this->logger->debug('profile_details: '.print_r($profile_details,1));

		// handle SetSellingManagerItemAutomationRule
		if ( ( isset($profile_details['sellingmanager_enabled']) ) && ( $profile_details['sellingmanager_enabled'] == '1' ) ) {
			$this->SetSellingManagerItemAutomationRule( $ItemID, $profile_details, $session );
		}

		## END PRO ##
	}

	function addItem( $id, $session )
	{
		// skip this item if item status not allowed
		$allowed_statuses = array( 'prepared', 'verified' );
		if ( ! $this->itemHasAllowedStatus( $id, $allowed_statuses ) ) return false;

		// build item
		$ibm = new ItemBuilderModel();
		$item = $ibm->buildItem( $id, $session );
		if ( ! $ibm->checkItem($item) ) return $ibm->result;

		// eBay Motors (beta)
		if ( $item->Site == 'eBayMotors' ) $session->setSiteId( 100 );

		// preparation - set up new ServiceProxy with given session
		$this->initServiceProxy($session);

		// switch to FixedPriceItem if product has variations
		$listing_item = $this->getItem( $id );
		// $useFixedPriceItem = ( ProductWrapper::hasVariations( $listing_item['post_id'] ) ) ? true : false;
		// $useFixedPriceItem = ( 'FixedPriceItem' == $listing_item['auction_type'] ) ? true : false;

		$this->logger->info( "Adding #$id: ".$item->Title );
		if ( $this->listingUsesFixedPriceItem( $listing_item ) ) {

			$req = new AddFixedPriceItemRequestType(); 
			$req->setItem($item);
			
			$this->logger->debug( "Request: ".print_r($req,1) );
			$res = $this->_cs->AddFixedPriceItem($req); 

		} else {

			$req = new AddItemRequestType(); 
			$req->setItem($item);
			
			$this->logger->debug( "Request: ".print_r($req,1) );
			$res = $this->_cs->AddItem($req); 

		}

		// handle response and check if successful
		if ( $this->handleResponse($res) ) {

			// save ebay ID and fees to db
			$listingFee = $this->getListingFeeFromResponse( $res );
			$data['ebay_id'] = $res->ItemID;
			$data['fees'] = $listingFee;
			$data['status'] = 'published';
			$this->updateListing( $id, $data );
			
			// get details like ViewItemURL from ebay automatically
			$this->updateItemDetails( $id, $session );
			$this->postProcessListing( $id, $res->ItemID, $item, $listing_item, $res, $session );

			$this->logger->info( "Item #$id sent to ebay, ItemID is ".$res->ItemID );

		} // call successful

		return $this->result;

	} // addItem()

	function relistItem( $id, $session )
	{
		// skip this item if item status not allowed
		$allowed_statuses = array( 'ended', 'sold' );
		if ( ! $this->itemHasAllowedStatus( $id, $allowed_statuses ) ) return false;

		// build item
		$ibm = new ItemBuilderModel();
		$item = $ibm->buildItem( $id, $session );
		if ( ! $ibm->checkItem($item) ) return $ibm->result;

		// eBay Motors (beta)
		if ( $item->Site == 'eBayMotors' ) $session->setSiteId( 100 );

		// preparation - set up new ServiceProxy with given session
		$this->initServiceProxy($session);

		// switch to FixedPriceItem if product has variations
		$listing_item = $this->getItem( $id );
		// $useFixedPriceItem = ( ProductWrapper::hasVariations( $listing_item['post_id'] ) ) ? true : false;
		// $useFixedPriceItem = ( 'FixedPriceItem' == $listing_item['auction_type'] ) ? true : false;

		// add old ItemID for relisting
		$item->setItemID( $listing_item['ebay_id'] );

		$this->logger->info( "Relisting #$id (ItemID ".$listing_item['ebay_id'].") - ".$item->Title );
		if ( $this->listingUsesFixedPriceItem( $listing_item ) ) {

			$req = new RelistFixedPriceItemRequestType(); 
			$req->setItem($item);
			
			$this->logger->debug( "Request: ".print_r($req,1) );
			$res = $this->_cs->RelistFixedPriceItem($req); 

		} else {

			$req = new RelistItemRequestType(); 
			$req->setItem($item);
			
			$this->logger->debug( "Request: ".print_r($req,1) );
			$res = $this->_cs->RelistItem($req); 

		}

		// handle response and check if successful
		if ( $this->handleResponse($res) ) {

			// save ebay ID and fees to db
			$listingFee = $this->getListingFeeFromResponse( $res );
			$data['ebay_id'] = $res->ItemID;
			$data['fees'] = $listingFee;
			$data['status'] = 'published';
			$this->updateListing( $id, $data );
			
			// get details like ViewItemURL from ebay automatically
			$this->updateItemDetails( $id, $session );
			$this->postProcessListing( $id, $res->ItemID, $item, $listing_item, $res, $session );

			$this->logger->info( "Item #$id relisted on ebay, NEW ItemID is ".$res->ItemID );

		} // call successful

		return $this->result;

	} // relistItem()

	function reviseItem( $id, $session )
	{
		// skip this item if item status not allowed
		$allowed_statuses = array( 'published', 'changed' );
		if ( ! $this->itemHasAllowedStatus( $id, $allowed_statuses ) ) return false;

		// check if product has variations
		$listing_item = $this->getItem( $id );
		// $useFixedPriceItem = ( ProductWrapper::hasVariations( $listing_item['post_id'] ) ) ? true : false;
		// $useFixedPriceItem = ( 'FixedPriceItem' == $listing_item['auction_type'] ) ? true : false;

		// build item
		$ibm = new ItemBuilderModel();
		$item = $ibm->buildItem( $id, $session, true );
		if ( ! $ibm->checkItem($item) ) return $ibm->result;

		// if quantity is zero, end item instead
		if ( ( $item->Quantity == 0 ) && ( ! $ibm->VariationsHaveStock ) ) {
			$this->logger->info( "Item #$id has no stock, switching to endItem()" );
			return $this->endItem( $id, $session );
		}

		// checkItem should run after check for zero quantity - not it shouldn't as VariationsHaveStock will be undefined
		// TODO: separate quantity checks from checkItem() and run checkQuantity() first, maybe end item, if not then run other sanity checks
		// (This helps users who use the import plugin and WP-Lister Pro but forgot to set a primary category in their profile)
		// if ( ! $ibm->checkItem($item) ) return $ibm->result;
		
		// eBay Motors (beta)
		if ( $item->Site == 'eBayMotors' ) $session->setSiteId( 100 );

		// preparation - set up new ServiceProxy with given session
		$this->initServiceProxy($session);

		// set ItemID to revise
		$item->setItemID( $this->getEbayIDFromID($id) );
		$this->logger->info( "Revising #$id: ".$p['auction_title'] );

		// switch to FixedPriceItem if product has variations
		if ( $this->listingUsesFixedPriceItem( $listing_item ) ) {

			$req = new ReviseFixedPriceItemRequestType(); 
			$req->setItem($item);
			
			$this->logger->debug( "Request: ".print_r($req,1) );
			$res = $this->_cs->ReviseFixedPriceItem($req); 

		} else {

			$req = new ReviseItemRequestType(); 
			$req->setItem($item);
			
			$this->logger->debug( "Request: ".print_r($req,1) );
			$res = $this->_cs->ReviseItem($req); 

		}

		// handle response and check if successful
		if ( $this->handleResponse($res) ) {

			// save ebay ID and fees to db
			#$listingFee = $this->getListingFeeFromResponse( $res );
			#$data['ebay_id'] = $res->ItemID;
			#$data['fees'] = $listingFee;
			$data['status'] = 'published';
			$this->updateListing( $id, $data );
			
			// get details like ViewItemURL from ebay automatically
			#$this->updateItemDetails( $id, $session );
			$this->postProcessListing( $id, $res->ItemID, $item, $listing_item, $res, $session );

			$this->logger->info( "Item #$id was revised, ItemID is ".$res->ItemID );

		} // call successful

		return $this->result;

	} // reviseItem()


	function verifyAddItem( $id, $session )
	{
		// skip this item if item status not allowed
		$allowed_statuses = array( 'prepared', 'verified' );
		if ( ! $this->itemHasAllowedStatus( $id, $allowed_statuses ) ) return false;

		// build item
		$ibm = new ItemBuilderModel();
		$item = $ibm->buildItem( $id, $session );
		if ( ! $ibm->checkItem($item) ) return $ibm->result;

		// eBay Motors (beta)
		if ( $item->Site == 'eBayMotors' ) $session->setSiteId( 100 );

		// preparation - set up new ServiceProxy with given session
		$this->initServiceProxy($session);

		// switch to FixedPriceItem if product has variations
		$listing_item = $this->getItem( $id );
		// $useFixedPriceItem = ( ProductWrapper::hasVariations( $listing_item['post_id'] ) ) ? true : false;
		// $useFixedPriceItem = ( 'FixedPriceItem' == $listing_item['auction_type'] ) ? true : false;

		$this->logger->info( "Verifying #$id: ".$item->Title );
		if ( $this->listingUsesFixedPriceItem( $listing_item ) ) {

			$req = new VerifyAddFixedPriceItemRequestType(); 
			$req->setItem($item);
			
			$this->logger->debug( "Request: ".print_r($req,1) );
			$res = $this->_cs->VerifyAddFixedPriceItem($req); 

		} else {

			$req = new VerifyAddItemRequestType(); 
			$req->setItem($item);
			
			$this->logger->debug( "Request: ".print_r($req,1) );
			$res = $this->_cs->VerifyAddItem($req); 

		}

		// handle response and check if successful
		if ( $this->handleResponse($res) ) {

			// save listing fees to db
			$listingFee = $this->getListingFeeFromResponse( $res );
			// $data['ebay_id'] = $res->ItemID;
			$data['fees'] = $listingFee;
			$data['status'] = 'verified';
			$this->updateListing( $id, $data );

			$this->logger->info( "Item #$id verified with ebay, getAck(): ".$res->getAck() );

		} // call successful
		
		return $this->result;

	} // verifyAddItem()


	function endItem( $id, $session )
	{
		// skip this item if item status not allowed
		$allowed_statuses = array( 'published', 'changed' );
		if ( ! $this->itemHasAllowedStatus( $id, $allowed_statuses ) ) return false;

		// preparation - set up new ServiceProxy with given session
		$this->initServiceProxy($session);

		// get eBay ID
		$item = $this->getItem( $id );
		$item_id = $item['ebay_id'];

		$req = new EndItemRequestType(); # ***
        $req->setItemID( $item_id );
        $req->setEndingReason('LostOrBroken');

		$this->logger->info( "calling EndItem($id) #$item_id " );
		$this->logger->debug( "Request: ".print_r($req,1) );
		$res = $this->_cs->EndItem($req); # ***
		$this->logger->info( "EndItem() Complete #$item_id" );
		$this->logger->debug( "Response: ".print_r($res,1) );

		// handle response and check if successful
		if ( $this->handleResponse($res) ) {

			// save ebay ID and fees to db
			$data['end_date'] = $res->EndTime;
			$data['status'] = 'ended';
			$this->updateListing( $id, $data );
			
			$this->logger->info( "Item #$id was ended manually. " );

		} // call successful

		return $this->result;

	} // endItem()


	function itemHasAllowedStatus( $id, $allowed_statuses )
	{
		$item = $this->getItem( $id );
		if ( in_array( $item['status'], $allowed_statuses ) ) {
			return true;
		} else {
			$this->logger->info("skipped item $id with status ".$item['status']);
			$this->logger->debug("allowed_statuses: ".print_r($allowed_statuses,1) );
			$this->showMessage( sprintf( 'Skipped %s item "%s" as its listing status is not %s', $item['status'], $item['auction_title'], join( $allowed_statuses, ' or ' ) ), false, true );
			return false;
		}

	} // itemHasAllowedStatus()


	function getListingFeeFromResponse( $res )
	{
		
		$fees = new FeesType();
		$fees = $res->GetFees();
		foreach ($fees->getFee() as $fee) {
			if ( $fee->GetName() == 'ListingFee' ) {
				$listingFee = $fee->GetFee()->getTypeValue();
			}
			$this->logger->debug( 'FeeName: '.$fee->GetName(). ' is '. $fee->GetFee()->getTypeValue().' '.$fee->GetFee()->getTypeAttribute('currencyID') );
		}
		return $listingFee;

	} // getListingFeeFromResponse()


	public function getLatestDetails( $ebay_id, $session ) {
		global $wpdb;

		// get item data
		// $item = $this->getItemByEbayID( $id );

		// preparation
		$this->initServiceProxy($session);

		// $this->_cs->setHandler('ItemType', array(& $this, 'updateItemDetail'));

		// download the shipping data
		$req = new GetItemRequestType();
        $req->setItemID( $ebay_id );

		$res = $this->_cs->GetItem($req);		

		// handle response and check if successful
		if ( $this->handleResponse($res) ) {
			$this->logger->info( "Item #$ebay_id was fetched from eBay... ".$res->ItemID );
			return $res->Item;
		} // call successful

		return $this->result;

	}

	public function updateItemDetails( $id, $session ) {
		global $wpdb;

		// get item data
		$item = $this->getItem( $id );

		// preparation
		$this->initServiceProxy($session);

		$this->_cs->setHandler('ItemType', array(& $this, 'updateItemDetail'));

		// download the shipping data
		$req = new GetItemRequestType();
        $req->setItemID( $item['ebay_id'] );
		#$req->setDetailName( 'PaymentOptionDetails' );
		#$req->setActiveList( true );

		$res = $this->_cs->GetItem($req);		

		// handle response and check if successful
		if ( $this->handleResponse($res) ) {
			$this->logger->info( "Item #$id was updated from eBay, ItemID is ".$res->ItemID );
		} // call successful

		return $this->result;

	}


	function updateItemDetail($type, & $Detail)
	{
		global $wpdb;
		
		//#type $Detail ItemType
		
		// map ItemType to DB columns
		$data = $this->mapItemDetailToDB( $Detail );

		$this->logger->debug('Detail: '.print_r($Detail,1) );
		$this->logger->debug('data: '.print_r($data,1) );

		$wpdb->update( $this->tablename, $data, array( 'ebay_id' => $Detail->ItemID ) );


		// check for an updated ItemID 

		// if item was relisted manually on ebay.com
		if ( $Detail->ListingDetails->RelistedItemID ) {
		
			// keep item id in history
			$this->addItemIdToHistory( $Detail->ItemID, $Detail->ItemID );

			// mark as relisted - ie. should be updated once again
			$wpdb->update( $this->tablename, array( 'status' => 'relisted' ), array( 'ebay_id' => $Detail->ItemID ) );

			// update the listings ebay_id
			$wpdb->update( $this->tablename, array( 'ebay_id' => $Detail->ListingDetails->RelistedItemID ), array( 'ebay_id' => $Detail->ItemID ) );

		}

		// if item was relisted through WP-Lister
		if ( $Detail->RelistParentID ) {
		
			// keep item id in history
			$this->addItemIdToHistory( $Detail->ItemID, $Detail->RelistParentID );

		}

		#$this->logger->info('sql: '.$wpdb->last_query );
		#$this->logger->info( mysql_error() );

		return true;
	}

	function mapItemDetailToDB( $Detail )
	{
		//#type $Detail ItemType
		$data['ebay_id'] 			= $Detail->ItemID;
		$data['auction_title'] 		= $Detail->Title;
		$data['auction_type'] 		= $Detail->ListingType;
		$data['listing_duration'] 	= $Detail->ListingDuration;
		$data['date_published'] 	= $Detail->ListingDetails->StartTime;
		$data['end_date'] 			= $Detail->ListingDetails->EndTime;
		$data['price'] 				= $Detail->SellingStatus->CurrentPrice->value;
		$data['quantity_sold'] 		= $Detail->SellingStatus->QuantitySold;
		$data['quantity'] 			= $Detail->Quantity;
		$data['ViewItemURL'] 		= $Detail->ListingDetails->ViewItemURL;
		$data['GalleryURL'] 		= $Detail->PictureDetails->GalleryURL;

		// if this item has variations, we don't update quantity
		if ( count( @$Detail->Variations->Variation ) > 0 ) {
			unset( $data['quantity'] );
			$this->logger->info('skip quantity for variation #'.$Detail->ItemID );
		}

		// set status to ended if end_date is in the past
		if ( time() > mysql2date('U', $data['end_date']) ) {
			$data['status'] 		= 'ended';
		} else {
			$data['status'] 		= 'published';			
		}

		$data['details'] = $this->encodeObject( $Detail );

		return $data;
	}



	public function updateListing( $id, $data ) {
		global $wpdb;

		// update
		$wpdb->update( $this->tablename, $data, array( 'id' => $id ) );

		#$this->logger->info('sql: '.$wpdb->last_query );
		#$this->logger->info( mysql_error() );
	}


	public function updateEndedListings( $sm = false ) {
		global $wpdb;

		$items = $this->getAllPastEndDate();

		foreach ($items as $item) {
			$wpdb->update( $this->tablename, array( 'status' => 'ended' ), array( 'id' => $item['id'] ) );
		}

		#$this->logger->info('sql: '.$wpdb->last_query );
		#$this->logger->info( mysql_error() );
	}



	function getItemsForGallery( $type = 'new', $related_to_id, $limit = 12 ) {
		global $wpdb;	

		switch ($type) {
			case 'ending':
				$wpdb->query("SET time_zone='+0:00'"); // tell SQL to use GMT
				$where_sql = "WHERE status = 'published' AND end_date < NOW()";
				$order_sql = "ORDER BY end_date DESC";
				break;
			
			case 'featured':
				$where_sql = "	JOIN {$wpdb->prefix}postmeta pm ON ( li.post_id = pm.post_id )
								WHERE status = 'published' 
								  AND pm.meta_key = '_featured'
								  AND pm.meta_value = 'yes'
							";
				$order_sql = "ORDER BY date_published, end_date DESC";
				break;
			
			case 'related': // combines upsell and crossell
				$listing         = $this->getItem($related_to_id);
				$upsell_ids      = get_post_meta( $listing['post_id'], '_upsell_ids', true );
				$crosssell_ids   = get_post_meta( $listing['post_id'], '_crosssell_ids', true );
				$inner_where_sql = '1 = 0';

				if ( is_array( $upsell_ids ) )
				foreach ($upsell_ids as $post_id) {
					$inner_where_sql .= ' OR post_id = "'.$post_id.'" ';
				}

				if ( is_array( $crosssell_ids ) )
				foreach ($crosssell_ids as $post_id) {
					$inner_where_sql .= ' OR post_id = "'.$post_id.'" ';
				}

				$where_sql = "	WHERE status = 'published' 
								  AND ( $inner_where_sql )
							";
				$order_sql = "ORDER BY date_published, end_date DESC";
				break;
			
			case 'new':
			default:
				$where_sql = "WHERE status = 'published' ";
				$order_sql = "ORDER BY date_published DESC";
				break;
		}

		$items = $wpdb->get_results("
			SELECT *
			FROM $this->tablename li
			$where_sql
			$order_sql
			LIMIT $limit
		", ARRAY_A);		

		return $items;		
	}

	function getAllSelected() {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'selected'
			   OR status = 'reselected'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllPrepared() {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'prepared'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllVerified() {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'verified'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllChanged() {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'changed'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllPublished() {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'published'
			   OR status = 'changed'
			   OR status = 'relisted'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllPreparedWithProfile( $profile_id ) {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'prepared'
			  AND profile_id = '$profile_id'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllVerifiedWithProfile( $profile_id ) {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'verified'
			  AND profile_id = '$profile_id'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllPublishedWithProfile( $profile_id ) {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE ( status = 'published' OR status = 'changed' )
			  AND profile_id = '$profile_id'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllEndedWithProfile( $profile_id ) {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'ended'
			  AND profile_id = '$profile_id'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllPreparedWithTemplate( $template ) {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'prepared'
			  AND template LIKE '%$template'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllVerifiedWithTemplate( $template ) {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'verified'
			  AND template LIKE '%$template'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllPublishedWithTemplate( $template ) {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE ( status = 'published' OR status = 'changed' )
			  AND template LIKE '%$template'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}
	function getAllPastEndDate() {
		global $wpdb;	
		$wpdb->query("SET time_zone='+0:00'"); // tell SQL to use GMT
		$items = $wpdb->get_results("
			SELECT id 
			FROM $this->tablename
			WHERE NOT status = 'ended'
			  AND NOT listing_duration = 'GTC'
			  AND end_date < NOW()
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}

	function getAllDuplicateProducts() {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT post_id, COUNT(*) c
			FROM $this->tablename
			GROUP BY post_id 
			HAVING c > 1
		", OBJECT_K);		

		if ( ! empty($items) ) {
			foreach ($items as &$item) {
				
				$listings = $this->getAllListingsFromPostID( $item->post_id );
				$item->listings = $listings;

			}
		}

		return $items;		
	}

	function getRawPostExcerpt( $post_id ) {
		global $wpdb;	
		$excerpt = $wpdb->get_var("
			SELECT post_excerpt 
			FROM {$wpdb->prefix}posts
			WHERE ID = '$post_id'
		");

		return $excerpt;		
	}



	public function selectedProducts() {
		global $wpdb;	
		$items = $wpdb->get_results("
			SELECT * 
			FROM $this->tablename
			WHERE status = 'selected'
			   OR status = 'reselected'
			ORDER BY id DESC
		", ARRAY_A);		

		return $items;		
	}

	public function setListingQuantity( $post_id, $quantity ) {
		global $wpdb;	
		$wpdb->update( $this->tablename, array( 'quantity' => $quantity ), array( 'post_id' => $post_id ) );
	}

	public function markItemAsModified( $post_id ) {
		global $wpdb;	

		// $listingsModel = new ListingsModel();
		$listing_id = $this->getListingIDFromPostID( $post_id );
        $this->reapplyProfileToItem( $listing_id );

		// set published items to changed
		// $wpdb->update( $this->tablename, array( 'status' => 'changed' ), array( 'status' => 'published', 'post_id' => $post_id ) );

		// set verified items to prepared
		// $wpdb->update( $this->tablename, array( 'status' => 'prepared' ), array( 'status' => 'verified', 'post_id' => $post_id ) );
	}


	public function reSelectListings( $ids ) {
		global $wpdb;
		foreach( $ids as $id ) {
			$status = $this->getStatus( $id );
			if ( $status == 'ended' ) {
				$wpdb->update( $this->tablename, array( 'status' => 'reselected' ), array( 'id' => $id ) );
			} else {
				$wpdb->update( $this->tablename, array( 'status' => 'selected' ), array( 'id' => $id ) );
			}
		}
	}

	## BEGIN PRO ##
	public function splitVariation( $id ) {
		global $wpdb; 

		// get listing item
		$listing_item = $this->getItem( $id );

		// return if there are no variations
		if ( ! ProductWrapper::hasVariations( $listing_item['post_id'] ) ) return false;

        // get profile
		$profilesModel = new ProfilesModel();
        $profile = $profilesModel->getItem( $listing_item['profile_id'] );

		// get variations
        $variations = ProductWrapper::getVariations( $listing_item['post_id'] );

        // loop variations
        $new_items = array();
        foreach ($variations as $var) {
			
        	// append attribute values to title
        	$title = $this->processSingleVariationTitle( $listing_item['auction_title'], $var['variation_attributes'] );

			// create new item
            $item_id = $this->prepareProductForListing( $var['post_id'], $listing_item['post_content'], $title );

            // get item object and save to array
           	$new_items[] = $this->getItem( $item_id );
        }

        // apply profile to new items - without modifying the title again
        $this->applyProfileToNewListings( $profile, $new_items, false );

        // end original item with variations
		$wpdb->update( $this->tablename, array( 'status' => 'ended' ), array( 'id' => $id ) );

		$this->logger->info('created '.count($new_items).' new items from variation ');
	}
	## END PRO ##

	public function processSingleVariationTitle( $title, $variation_attributes ) {
    	
    	$title = trim( $title );
    	if ( ! is_array( $variation_attributes ) ) return $title;

    	foreach ( $variation_attributes as $attrib_name => $attrib_value ) { // wpec?
    		$title .= ' - ' . $attrib_value;
    	}

    	return $title;
	}

	public function prepareListings( $ids ) {
		foreach( $ids as $id ) {
			$this->prepareProductForListing( $id );
		}
	}

	public function prepareProductForListing( $post_id, $post_content = false, $post_title = false ) {
		global $wpdb;
		
		// get wp post record
		$post = get_post( $post_id );
		
		// gather product data
		$data['post_id'] = $post_id;
		$data['auction_title'] = $post_title ? $post_title : $post->post_title;
		$data['post_content'] = $post_content ? $post_content : $post->post_content;
		$data['price'] = ProductWrapper::getPrice( $post_id );
		$data['status'] = 'selected';
		
		$this->logger->info('insert new auction '.$post_id.' - title: '.$data['auction_title']);
		$this->logger->debug( print_r($post,1) );
		
		// insert in auctions table
		$wpdb->insert( $this->tablename, $data );

		$this->logger->debug('sql: '.$wpdb->last_query );
		$this->logger->debug( mysql_error() );
		
		return $wpdb->insert_id;
		
	}

	function applyProfilePrice( $product_price, $profile_price ) {
	
		$this->logger->debug('applyProfilePrice(): '.$product_price.' - '.$profile_price );

		// remove all spaces from profile setting
		$profile_price = str_replace( ' ','', trim($profile_price) );
		
		// return product price if profile is empty
		if ( $profile_price == '' ) return $product_price;
	
		// handle percent
		if ( preg_match('/\%/',$profile_price) ) {
			$this->logger->debug('percent mode');
		
			// parse percent syntax
			if ( preg_match('/([\+\-]?)([0-9\.]+)(\%)/',$profile_price, $matches) ) {
				$this->logger->debug('matches:' . print_r($matches,1) );

				$modifier = $matches[1];
				$value = $matches[2];
				
				if ($modifier == '+') {
					return $product_price + ( $product_price * $value/100 );							
				} elseif ($modifier == '-') {
					return $product_price - ( $product_price * $value/100 );				
				} else {
					return ( $product_price * $value/100 );
				}
			
			} else {
				// no valid syntax
				return $product_price;		
			}
						
		} else {

			$this->logger->debug('value mode');
		
			// parse value syntax
			if ( preg_match('/([\+\-]?)([0-9\.]+)/',$profile_price, $matches) ) {
				$this->logger->debug('matches:' . print_r($matches,1) );

				$modifier = $matches[1];
				$value = $matches[2];
				
				if ($modifier == '+') {
					return $product_price + $value;				
				} elseif ($modifier == '-') {
					return $product_price - $value;				
				} else {
					return $value;
				}
			
			} else {
				// no valid syntax
				return $product_price;		
			}
		
		}

	}

	public function applyProfileToItem( $profile, $item, $update_title = true ) {
		global $wpdb;

		// get item data
		$id 		= $item['id'];
		$post_id 	= $item['post_id'];
		$status 	= $this->getStatus( $id );
		$ebay_id 	= $this->getEbayIDFromID( $id );
		$post_title = get_the_title( $item['post_id'] );

		// skip ended auctions - or not, if you want to relist them...
		// if ( $status == 'ended' ) return;

		// use parent title for single (split) variation
		if ( ProductWrapper::isSingleVariation( $post_id ) ) {
			$parent_id = ProductWrapper::getVariationParent( $post_id );
			$post_title = get_the_title( $parent_id );

			// get variations
    	    $variations = ProductWrapper::getVariations( $parent_id );

    	    // find this variation in all variations of this parent
    	    foreach ($variations as $var) {
    	    	if ( $var['post_id'] == $post_id ) {

	    	    	// append attribute values to title
    	    		$post_title = $this->processSingleVariationTitle( $post_title, $var['variation_attributes'] );

    	    	}
    	    }

		}

		// gather profile data
		$data = array();
		$data['profile_id'] 		= $profile['profile_id'];
		$data['auction_type'] 		= $profile['type'];
		$data['listing_duration'] 	= $profile['listing_duration'];
		$data['template'] 			= $profile['details']['template'];
		$data['quantity'] 			= $profile['details']['quantity'];
		$data['date_created'] 		= date( 'Y-m-d H:i:s' );
		$data['profile_data'] 		= $this->encodeObject( $profile );
		
		// add prefix and suffix to product title
		if ( $update_title ) {

			// append space to prefix, prepend space to suffix
			// TODO: make this an option
			$title_prefix = trim( $profile['details']['title_prefix'] ) . ' ';
			$title_suffix = ' ' . trim( $profile['details']['title_suffix'] );

			// custom post meta fields override profile values
			if ( get_post_meta( $post_id, 'ebay_title_prefix', true ) ) {
				$title_prefix = trim( get_post_meta( $post_id, 'ebay_title_prefix', true ) ) . ' ';
			}
			if ( get_post_meta( $post_id, 'ebay_title_suffix', true ) ) {
				$title_prefix = trim( get_post_meta( $post_id, 'ebay_title_suffix', true ) ) . ' ';
			}

			$data['auction_title'] = trim( $title_prefix . $post_title . $title_suffix );

			// custom post meta title override
			if ( get_post_meta( $post_id, '_ebay_title', true ) ) {
				$data['auction_title']  = trim( get_post_meta( $post_id, '_ebay_title', true ) );
			} elseif ( get_post_meta( $post_id, 'ebay_title', true ) ) {
				$data['auction_title']  = trim( get_post_meta( $post_id, 'ebay_title', true ) );
			}

			// process attribute shortcodes in title - like [[attribute_Brand]]
			$templatesModel = new TemplatesModel();
			// $this->logger->info('auction_title before processing: '.$data['auction_title'].'');
			$data['auction_title'] = $templatesModel->processAllTextShortcodes( $item['post_id'], $data['auction_title'], 80 );
			$this->logger->info('auction_title after processing : '.$data['auction_title'].'');

		}

		// apply profile price
		$data['price'] = ProductWrapper::getPrice( $post_id );
		$data['price']  = $this->applyProfilePrice( $data['price'], $profile['details']['start_price'] );
		
		// fetch product stock if no quantity set in profile
		if ( intval( $data['quantity'] ) == 0 ) {
			$data['quantity'] = intval( ProductWrapper::getStock( $post_id ) );
		}
		
		// default new status is 'prepared'
		$data['status'] = 'prepared';
		// except for already published items where it is 'changed'
		if ( intval($ebay_id) > 0 ) $data['status'] = 'changed';
		// ended items stay 'ended'
		if ( $status == 'ended' ) $data['status'] = 'ended';
		// reselected items have already been 'ended'
		if ( $status == 'reselected' ) $data['status'] = 'ended';

		// update auctions table
		$wpdb->update( $this->tablename, $data, array( 'id' => $id ) );

		// $this->logger->info('updating listing ID '.$id);
		// $this->logger->info('data: '.print_r($data,1));
		// $this->logger->info('sql: '.$wpdb->last_query);
		// $this->logger->info('error: '.mysql_error());

	    ## BEGIN PRO ##
        if ( isset( $profile['details']['variations_mode'] ) && ( $profile['details']['variations_mode'] == 'split' ) ) {
			if ( ProductWrapper::hasVariations( $post_id ) ) {
				$this->splitVariation( $id );
			}
		}
	    ## END PRO ##

	}

	public function applyProfileToItems( $profile, $items, $update_title = true ) {

		// apply profile to all items
		foreach( $items as $item ) {
			$this->applyProfileToItem( $profile, $item, $update_title );			
		}

		return $items;		
	}


	public function applyProfileToNewListings( $profile, $items = false, $update_title = true ) {

		// get selected items - if no items provided
		if (!$items) $items = $this->getAllSelected();

		$items = $this->applyProfileToItems( $profile, $items, $update_title );			

		return $items;		
	}

	public function reapplyProfileToItem( $id ) {
	
		// get item
		if ( !$id ) return;
		$item = $this->getItem( $id );
		if ( empty($item) ) return;

		// get profile
		$profilesModel = new ProfilesModel();
        $profile = $profilesModel->getItem( $item['profile_id'] );

        // re-apply profile
        $this->applyProfileToItem( $profile, $item );

	}

	public function reapplyProfileToItems( $ids ) {
		foreach( $ids as $id ) {
			$this->reapplyProfileToItem( $id );
		}
	}


}
