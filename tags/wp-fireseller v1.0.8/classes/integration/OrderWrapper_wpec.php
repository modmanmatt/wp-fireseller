<?php
/**
 * wrapper functions to access orders on WP e-Commerce
 */

class OrderWrapper {
	
	const plugin = 'wpec';
	const post_type = 'order_post_type';
	
	// get custom post type
	static function getPostType() {
		return self::post_type;
	}	
	
	// create order from transaction
	static function createOrderFromTransaction( $id ) {
		global $wpdb;

		// get transaction details
		$transactionsModel = new TransactionsModel();		
		$item = $transactionsModel->getItem( $id );
		$details = $item['details'];
		// print_r($details);die();

		// create purchase
		$post_data = array(
			'date'             => date('U', strtotime( $details->CreatedDate ) ),
			'sessionid'        => $details->TransactionID,
			'totalprice'       => $details->TransactionPrice->value,
			'billing_country'  => $details->Buyer->RegistrationAddress->Country,
			'shipping_country' => $details->Buyer->BuyerInfo->ShippingAddress->Country,
			'notes'            => $details->BuyerCheckoutMessage,
			'wpec_taxes_total' => 0.00,
			'wpec_taxes_rate'  => 0.00,
			'shipping_method'  => $details->ShippingServiceSelected->ShippingService,
			'shipping_option'  => $details->ShippingServiceSelected->ShippingService,
			'processed'  	   => '2',
			'plugin_version'   => '3.8.7.6.2',
			'gateway'          => $details->Status->PaymentMethodUsed,
			'find_us'          => 'ebay'
		);

		// Insert the post into the database
		$wpdb->insert( $wpdb->prefix.'wpsc_purchase_logs', $post_data );
		$purchase_id = $wpdb->insert_id;
		echo mysql_error();
		if ( intval( $purchase_id ) == 0 ) return false;
		
		// creating form field lookup table
		$lookup_table = array();
		$fields = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpsc_checkout_forms ORDER BY id");
		echo mysql_error();
		foreach ($fields as $field) {
			if ( $field->unique_name ) $lookup_table[ $field->unique_name ] = $field->id;
		}

		// split name in firstname and lastname
		list( $billingfirstname,  $billinglastname  ) = split( ' ', $details->Buyer->RegistrationAddress->Name, 2 );
		list( $shippingfirstname, $shippinglastname ) = split( ' ', $details->Buyer->BuyerInfo->ShippingAddress->Name, 2 );

		// empty optional fields
		if ($details->Buyer->Email == 'Invalid Request') $details->Buyer->Email = '';
		if ($details->Buyer->RegistrationAddress->Phone == 'Invalid Request') $details->Buyer->RegistrationAddress->Phone = '';

		// create form field records
		self::createFormData( $lookup_table, $purchase_id, 'billingfirstname', $billingfirstname );
		self::createFormData( $lookup_table, $purchase_id, 'billinglastname', $billinglastname );
		self::createFormData( $lookup_table, $purchase_id, 'billingaddress', $details->Buyer->RegistrationAddress->Street1 .' '. $details->Buyer->RegistrationAddress->Street2 );
		self::createFormData( $lookup_table, $purchase_id, 'billingcity', $details->Buyer->RegistrationAddress->CityName );
		self::createFormData( $lookup_table, $purchase_id, 'billingpostcode', $details->Buyer->RegistrationAddress->PostalCode );
		self::createFormData( $lookup_table, $purchase_id, 'billingcountry', $details->Buyer->RegistrationAddress->CountryName );
		self::createFormData( $lookup_table, $purchase_id, 'billingstate', $details->Buyer->RegistrationAddress->StateOrProvince );
		self::createFormData( $lookup_table, $purchase_id, 'billingemail', $details->Buyer->Email );		
		self::createFormData( $lookup_table, $purchase_id, 'shippingfirstname', $shippingfirstname );
		self::createFormData( $lookup_table, $purchase_id, 'shippinglastname', $shippinglastname );
		self::createFormData( $lookup_table, $purchase_id, 'shippingaddress', $details->Buyer->BuyerInfo->ShippingAddress->Street1 .' '. $details->Buyer->BuyerInfo->ShippingAddress->Street2 );
		self::createFormData( $lookup_table, $purchase_id, 'shippingcity', $details->Buyer->BuyerInfo->ShippingAddress->CityName );
		self::createFormData( $lookup_table, $purchase_id, 'shippingpostcode', $details->Buyer->BuyerInfo->ShippingAddress->PostalCode );
		self::createFormData( $lookup_table, $purchase_id, 'shippingcountry', $details->Buyer->BuyerInfo->ShippingAddress->CountryName );
		self::createFormData( $lookup_table, $purchase_id, 'shippingstate', $details->Buyer->BuyerInfo->ShippingAddress->StateOrProvince );



		// Order item(s)
		 
		// get listing item from db
		$listingsModel = new ListingsModel();
		$listingItem = $listingsModel->getItemByEbayID( $details->Item->ItemID );

		$item_id			= $listingItem->post_id;
		$item_variation		= '';
		$item_name 			= $listingItem->auction_title;
		$item_quantity 		= $details->QuantityPurchased;
		
		$line_total 		= $item_quantity * $details->TransactionPrice->value;
		$line_tax		 	= '0.00';

		$item_tax_class		= '';
		
		// use variation title - if supplied
		if ( @$details->Variation->VariationTitle != '' ) {
			$item_name = $details->Variation->VariationTitle;
		}

		// Meta
		// TODO: get meta values if item has variations
		$item_meta = array();
					
		// Add to array	 	
		$order_item = array(
			'prodid' 			=> stripslashes( $item_id ),
			'purchaseid' 		=> stripslashes( $purchase_id ),
			// 'variation_id' 	=> (int) $item_variation,
			'name' 				=> htmlspecialchars(stripslashes( $item_name )),
			'price'				=> rtrim(rtrim(number_format( $line_total, 4, '.', ''), '0'), '.'),
			'tax_charged'		=> rtrim(rtrim(number_format( $line_tax, 4, '.', ''), '0'), '.'),
			'quantity' 			=> (int) $item_quantity,
			'files' 			=> 'N;'
		);
	
		$wpdb->insert( $wpdb->prefix.'wpsc_cart_contents', $order_item );
		echo mysql_error();

		return $purchase_id;

	} // createOrderFromTransaction()

	// update order from transaction
	static function updateOrderFromTransaction( $id ) {
	}		
	
	static function createFormData( $lookup_table, $purchase_id, $fieldname, $value ) {
		global $wpdb;

		$form_id = $lookup_table[ $fieldname ];
		if ( intval( $form_id ) == 0 ) return false;

		$data = array(
			'log_id'  => $purchase_id,
			'form_id' => $form_id,
			'value'   => $value
		);

		// Insert the post into the database
		$wpdb->insert( $wpdb->prefix.'wpsc_submited_form_data', $data );
		echo mysql_error();

	}
	
	static function listen_to_checkout_event() {
	}	

}
