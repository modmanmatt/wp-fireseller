<?php
/**
 * ItemBuilderModel class
 *
 * responsible for building listing items
 * 
 */

class ItemBuilderModel extends WPL_Model {

	// var $_session;
	// var $_cs;
	
	var $variationAttributes = array();
	var $result = false;

	function ItemBuilderModel()
	{
		global $wpl_logger;
		$this->logger = &$wpl_logger;

		// provide listings model
		$this->lm = new ListingsModel();
	}



	function buildItem( $id, $session, $reviseItem = false )
	{

		// fetch record from db
		$p               = $this->lm->getItem( $id );
		$post_id 		 = $p['post_id'];
		$profile_details = $p['profile_data']['details'];
		$hasVariations   = ProductWrapper::hasVariations( $post_id );
		
		$images          = $this->getProductImagesURL( $post_id );
		$main_image      = $this->getProductMainImageURL( $post_id );
		if ( ( trim($main_image) == '' ) && ( sizeof($images) > 0 ) ) $main_image = $images[0];
		
		$product_sku     = ProductWrapper::getSKU( $post_id );
		if ( trim($product_sku) == '' ) $product_sku = false;


		// price has been calculated when applying the profile
		$start_price  = $p['price'];


		// build item
		$item = new ItemType();

		// Set Listing Properties
		$item->ListingDuration = $p['listing_duration'];
		$item->Quantity = $p['quantity'];

		
		// omit ListingType when revising item
		if ( ! $reviseItem ) {
			$product_listing_type = get_post_meta( $post_id, '_ebay_auction_type', true );
			$item->ListingType = $product_listing_type ? $product_listing_type : $p['auction_type'];
		}

		// support for WooCommerce Name Your Price plugin
		$nyp_enabled = get_post_meta( $post_id, '_nyp', true ) == 'yes' ? true : false;
		if ( $nyp_enabled ) {
			$suggested_price = get_post_meta( $post_id, '_suggested_price', true );
			if ( $suggested_price ) $start_price = $suggested_price;
		}

		// handle StartPrice on product level
		if ( $product_start_price = get_post_meta( $post_id, '_ebay_start_price', true ) ) {
			$start_price  = $product_start_price;
		}

		// Set the Listing Starting Price and Buy It Now Price
		$item->StartPrice = new AmountType();
		$item->StartPrice->setTypeValue( $start_price );
		$item->StartPrice->setTypeAttribute('currencyID', $profile_details['currency'] );

		// optional BuyItNow price
		if ( intval($profile_details['fixed_price']) != 0) {
			$buynow_price = $this->lm->applyProfilePrice( $p['price'], $profile_details['fixed_price'] );
			$item->BuyItNowPrice = new AmountType();
			$item->BuyItNowPrice->setTypeValue( $buynow_price );
			$item->BuyItNowPrice->setTypeAttribute('currencyID', $profile_details['currency'] );
		}
		if ( $buynow_price = get_post_meta( $post_id, '_ebay_buynow_price', true ) ) {
			$item->BuyItNowPrice = new AmountType();
			$item->BuyItNowPrice->setTypeValue( $buynow_price );
			$item->BuyItNowPrice->setTypeAttribute('currencyID', $profile_details['currency'] );
		}

		// optional ReservePrice
		if ( $product_reserve_price = get_post_meta( $post_id, '_ebay_reserve_price', true ) ) {
			$item->ReservePrice = new AmountType();
			$item->ReservePrice->setTypeValue( $product_reserve_price );
			$item->ReservePrice->setTypeAttribute('currencyID', $profile_details['currency'] );
		}

		// optional DiscountPriceInfo.OriginalRetailPrice
		if ( intval($profile_details['strikethrough_pricing']) != 0) {
			if ( method_exists( ProductWrapper, 'getOriginalPrice' ) ) {
				$original_price = ProductWrapper::getOriginalPrice( $post_id );
				if ( ( $original_price ) && ( $start_price != $original_price ) ) {
					$item->DiscountPriceInfo = new DiscountPriceInfoType();
					$item->DiscountPriceInfo->OriginalRetailPrice = new AmountType();
					$item->DiscountPriceInfo->OriginalRetailPrice->setTypeValue( $original_price );
					$item->DiscountPriceInfo->OriginalRetailPrice->setTypeAttribute('currencyID', $profile_details['currency'] );
				}
			}
		}

		// Set the Item Title
		$item->Title = $this->prepareTitle( $p['auction_title'] );

		// SKU - omit if empty
		if ($product_sku) $item->SKU = $product_sku;


		// set UPC from SKU - if enabled
		if ( ($product_sku) && ( @$profile_details['use_sku_as_upc'] == '1' ) ) {
			$ProductListingDetails = new ProductListingDetailsType();
			$ProductListingDetails->setUPC( $product_sku );
			$item->setProductListingDetails( $ProductListingDetails );
		}

		// set UPC from product - if provided
		if ( $product_upc = get_post_meta( $post_id, '_ebay_upc', true ) ) {
			$ProductListingDetails = new ProductListingDetailsType();
			$ProductListingDetails->setUPC( $product_upc );
			$item->setProductListingDetails( $ProductListingDetails );
		}
		

		// handle product image
		$item->PictureDetails = new PictureDetailsType();
		$item->PictureDetails->setGalleryURL( $this->encodeUrl( $main_image ) );
		$item->PictureDetails->addPictureURL( $this->encodeUrl( $main_image ) );
		if ( $profile_details['with_gallery_image'] ) $item->PictureDetails->GalleryType = 'Gallery';
        
		## BEGIN PRO ##

        // upload ALL additional images if enabled
        $with_additional_images = isset( $profile_details['with_additional_images'] ) ? $profile_details['with_additional_images'] : false;
        if ( $with_additional_images == '0' ) $with_additional_images = false;

        if ( $with_additional_images ) {

        	// set upload limit in regard to selected mode
        	if ( $with_additional_images == '1' ) $images_upload_limit = false;
        	if ( $with_additional_images == '2' ) $images_upload_limit = 12;
        	if ( $with_additional_images == '3' ) $images_upload_limit = 0;

			// upload main image
			$image_url = $this->lm->uploadPictureToEPS( $main_image, $id, $session );
			$this->logger->info( "uploaded main image $image_url" );

			$item->PictureDetails = new PictureDetailsType();
			$item->PictureDetails->setGalleryURL( $image_url );
			$item->PictureDetails->addPictureURL( $image_url );
			$item->PictureDetails->setGalleryType( 'Gallery' );
			$item->PictureDetails->setPhotoDisplay( 'PicturePack' );

			// upload additional images - if enabled
			if ( $with_additional_images != '3' ) {

				$images_upload_count = 1; // main image has already been added
	        	foreach ($images as $additional_image) {
	        		if ( basename($additional_image) != basename($main_image) ) {
	        			// upload image
	        			$image_url = $this->lm->uploadPictureToEPS( $additional_image, $id, $session );
						if ( $image_url ) $item->PictureDetails->addPictureURL( $image_url );
						$this->logger->info( "uploaded additional image #$images_upload_count: $additional_image - limit is $images_upload_limit" );
						$images_upload_count++;
	        		}
	        		// break loop when upload limit is reached
	        		if ( ( $images_upload_limit ) && ( $images_upload_count >= $images_upload_limit ) ) break;
	        	}
			}

        } // $with_additional_images


        // handle require immediate payment option
        if ( @$profile_details['autopay'] == '1' ) {
			$item->setAutoPay( true );
        }

        // handle BestOffer options
        if ( ( @$profile_details['bestoffer_enabled'] == '1' ) || ( $nyp_enabled ) ) {

        	$item->BestOfferDetails = new BestOfferDetailsType();
        	$item->BestOfferDetails->setBestOfferEnabled( true );

        	$item->ListingDetails = new ListingDetailsType();

	        if ( @$profile_details['bo_autoaccept_price'] != '' ) {
	        	$bo_autoaccept_price = $this->lm->applyProfilePrice( $start_price, $profile_details['bo_autoaccept_price'] );
        		$item->ListingDetails->setBestOfferAutoAcceptPrice( $bo_autoaccept_price );
        	}

	        if ( @$profile_details['bo_minimum_price'] != '' ) {
	        	$bo_minimum_price = $this->lm->applyProfilePrice( $start_price, $profile_details['bo_minimum_price'] );
        		$item->ListingDetails->setMinimumBestOfferPrice( $bo_minimum_price );
        	}

			if ( $nyp_enabled ) {
				$nyp_minimum_price = get_post_meta( $post_id, '_min_price', true );
				if ( $nyp_minimum_price ) $item->ListingDetails->setMinimumBestOfferPrice( $nyp_minimum_price );
				$this->logger->info( 'NYP enabled: ' . $nyp_minimum_price );
			}

        }

		// cross border trade / International site visibility
		if ( @$profile_details['cross_border_trade'] != '' ) {
			$item->addCrossBorderTrade( $profile_details['cross_border_trade'] );
		}

		// schedule listing
		if ( @$profile_details['schedule_time'] != '' ) {
			
			// parse schedule time
			list( $hour, $minute ) = explode(':', $profile_details['schedule_time'] );

			// get the day (today or tomorrow)
			$date = gmdate('Y-m-d', time() );

			// get GMT timestamp of schedule time
			$scheduled_datetime_gmt = gmdate('U', strtotime( $date.' '.$hour.':'.$minute.':00' ));
			$current_datetime_gmt = gmdate('U', time() );

			// check if scheduled time has already passed
			if ( $scheduled_datetime_gmt < $current_datetime_gmt ) {

				// add 24 hours
				$date = gmdate('Y-m-d', time() + 24 * 60 * 60 );

				// update ts
				$scheduled_datetime_gmt = gmdate('U', strtotime( $date.' '.$hour.':'.$minute.':00' ));

			}

			$this->logger->info( 'Listing was scheduled in ' . human_time_diff( $current_datetime_gmt, $scheduled_datetime_gmt ) );

			// set ScheduleTime
			$ScheduleTime = $date.'T'.$hour.':'.$minute.':00.000Z';
			$item->setScheduleTime( $ScheduleTime );

		}

		## END PRO ##



		// handle VAT (percent)
		if ( $profile_details['tax_mode'] == 'fix' ) {
			$item->VATDetails = new VATDetailsType();
			$item->VATDetails->VATPercent = floatval( $profile_details['vat_percent'] );
		}

		// use Sales Tax Table
		if ( $profile_details['tax_mode'] == 'ebay_table' ) {
			$item->UseTaxTable = true;
		}

		// Set Local Info
		$item->Currency = $profile_details['currency'];
		$item->Country = $profile_details['country'];
		$item->Location = $profile_details['location'];
		$item->DispatchTimeMax = $profile_details['dispatch_time'];

		// item condition
		if ( $profile_details['condition_id'] != 'none' ) {
			$item->ConditionID = $profile_details['condition_id'];
		}

		// postal code
		if ( $profile_details['postcode'] != '' ) {
			$item->PostalCode = $profile_details['postcode'];
		}

		// set eBay site from global site iD
		// http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SiteCodeType.html
		$site_id = $session->getSiteId();
		$sites = EbayController::getEbaySites();
		$site_name = $sites[$site_id];
		$item->Site = $site_name; 


		#$item->setSubTitle('Brandneuer iPod Mini!');
		#$item->setListingEnhancement('Highlight');
		$item->setHitCounter( $profile_details['counter_style'] );


		// ReturnPolicy
		$item->ReturnPolicy = new ReturnPolicyType();
		if ( $profile_details['returns_accepted'] == 1 ) {
			$item->ReturnPolicy->ReturnsAcceptedOption = 'ReturnsAccepted';
			$item->ReturnPolicy->ReturnsWithinOption   = $profile_details['returns_within'];
			$item->ReturnPolicy->Description           = stripslashes( $profile_details['returns_description'] );

			if ( ( isset($profile_details['RestockingFee']) ) && ( $profile_details['RestockingFee'] != '' ) ) {
				$item->ReturnPolicy->RestockingFeeValueOption = $profile_details['RestockingFee'];
			}

		} else {
			$item->ReturnPolicy->ReturnsAcceptedOption = 'ReturnsNotAccepted';
		}			


		// Set Payment Methods
		// $item->PaymentMethods[] = 'PersonalCheck';
		// $item->PaymentMethods[] = 'PayPal';
		// $item->PayPalEmailAddress = 'youraccount@yourcompany.com';
		foreach ( $profile_details['payment_options'] as $payment_method ) {

			if ( $payment_method['payment_name'] == '' ) continue;			

			# BuyerPaymentMethodCodeType
			$item->addPaymentMethods( $payment_method['payment_name'] );
			if ( $payment_method['payment_name'] == 'PayPal' ) {
				$item->PayPalEmailAddress = get_option( 'wplister_paypal_email' );
			}
		}

		// add subtitle if enabled
		if ( @$profile_details['subtitle_enabled'] == 1 ) {
			
			// check if custom post meta field '_ebay_subtitle' exists
			if ( get_post_meta( $post_id, '_ebay_subtitle', true ) ) {
				$subtitle = get_post_meta( $post_id, '_ebay_subtitle', true );
			} elseif ( get_post_meta( $post_id, 'ebay_subtitle', true ) ) {
				$subtitle = get_post_meta( $post_id, 'ebay_subtitle', true );
			} else {
				// check for custom subtitle from profile
				$subtitle = @$profile_details['custom_subtitle'];
			}

			// if empty use product excerpt
			if ( $subtitle == '' ) {
				$the_post = get_post( $post_id );
				$subtitle = strip_tags( $the_post->post_excerpt );
			}
			
			// limit to 55 chars to avoid error
			$subtitle = substr( $subtitle, 0, 55 );

			$item->setSubTitle( $subtitle );			
			$this->logger->debug( 'setSubTitle: '.$subtitle );
		}

		// item condition description
		$condition_description = false;
		if ( @$profile_details['condition_description'] != '' ) {
			$condition_description =  $profile_details['condition_description'];
		}
		if ( get_post_meta( $post_id, '_ebay_condition_description', true ) ) {
			$condition_description = get_post_meta( $post_id, '_ebay_condition_description', true );
		}
		if ( $condition_description ) {
			// $templatesModel = new TemplatesModel( $p['template'] );
			$templatesModel = new TemplatesModel();
			$condition_description = $templatesModel->processAllTextShortcodes( $post_id, $condition_description );
			$item->setConditionDescription( $condition_description );
		}

		// private listing
		if ( @$profile_details['private_listing'] == 1 ) {
			$item->setPrivateListing( true );
		}

		// add shipping services and options
		$item = $this->buildShipping( $id, $item, $post_id, $profile_details );			

		// add ebay categories and store categories
		$item = $this->buildCategories( $id, $item, $post_id, $profile_details );			

		// add variations
		if ( $hasVariations ) {
			if ( @$profile_details['variations_mode'] == 'flat' ) {
				// don't build variations - list as flat item
				$item = $this->flattenVariations( $id, $item, $profile_details );	
			} else {
				// default: list as variations
				$item = $this->buildVariations( $id, $item, $profile_details );	
			}
		}
	
		// add item specifics (attributes) - after variations
		$item = $this->buildItemSpecifics( $id, $item );			

		// Set the Item Description
		$item->Description = $this->getFinalHTML( $id );

	
		return $item;

	} /* end of buildItem() */

	public function buildCategories( $id, $item, $post_id, $profile_details ) {

		// handle primary category
		if ( intval($profile_details['ebay_category_1_id']) > 0 ) {
			$item->PrimaryCategory = new CategoryType();
			$item->PrimaryCategory->CategoryID = $profile_details['ebay_category_1_id'];
		} else {
			// get ebay categories map
			$categories_map_ebay = get_option( 'wplister_categories_map_ebay' );
            
			// fetch products local category terms
			$terms = wp_get_post_terms( $post_id, ProductWrapper::getTaxonomy() );
			// $this->logger->info('terms: '.print_r($terms,1));

			$ebay_category_id = false;
			$primary_category_id = false;
			$secondary_category_id = false;
  			foreach ( $terms as $term ) {

	            // look up ebay category 
	            if ( isset( $categories_map_ebay[ $term->term_id ] ) ) {
    		        $ebay_category_id = @$categories_map_ebay[ $term->term_id ];
    		        $ebay_category_id = apply_filters( 'wplister_apply_ebay_category_map', $ebay_category_id, $post_id );
	            }
	            
	            // check ebay category 
	            if ( intval( $ebay_category_id ) > 0 ) {

	            	if ( ! $primary_category_id ) {
	    		        $primary_category_id = $ebay_category_id;
	            	} else {
	            		$secondary_category_id = $ebay_category_id;
	            	}
	            }

  			}

			$this->logger->info('mapped primary_category_id: '.$primary_category_id);
			$this->logger->info('mapped secondary_category_id: '.$secondary_category_id);

            if ( intval( $primary_category_id ) > 0 ) {
				$item->PrimaryCategory = new CategoryType();
				$item->PrimaryCategory->CategoryID = $primary_category_id;
            }

            if ( intval( $secondary_category_id ) > 0 ) {
				$item->SecondaryCategory = new CategoryType();
				$item->SecondaryCategory->CategoryID = $secondary_category_id;
            }

		}

		// optional secondary category
		if ( intval($profile_details['ebay_category_2_id']) > 0 ) {
			$item->SecondaryCategory = new CategoryType();
			$item->SecondaryCategory->CategoryID = $profile_details['ebay_category_2_id'];
		}



		// handle optional store category
		if ( intval($profile_details['store_category_1_id']) > 0 ) {
			$item->Storefront = new StorefrontType();
			$item->Storefront->StoreCategoryID = $profile_details['store_category_1_id'];
		} else {
			// get store categories map
			$categories_map_store = get_option( 'wplister_categories_map_store' );

			// fetch products local category terms
			$terms = wp_get_post_terms( $post_id, ProductWrapper::getTaxonomy() );
			// $this->logger->info('terms: '.print_r($terms,1));

			$store_category_id = false;
			$primary_store_category_id = false;
			$secondary_store_category_id = false;
  			foreach ( $terms as $term ) {

	            // look up store category 
	            if ( isset( $categories_map_store[ $term->term_id ] ) ) {
    		        $store_category_id = @$categories_map_store[ $term->term_id ];
	            }
	            
	            // check store category 
	            if ( intval( $store_category_id ) > 0 ) {

	            	if ( ! $primary_store_category_id ) {
	    		        $primary_store_category_id = $store_category_id;
	            	} else {
	            		$secondary_store_category_id = $store_category_id;
	            	}
	            }

  			}

			$this->logger->info('mapped primary_store_category_id: '.$primary_store_category_id);
			$this->logger->info('mapped secondary_store_category_id: '.$secondary_store_category_id);

            if ( intval( $primary_store_category_id ) > 0 ) {
				$item->Storefront = new StorefrontType();
				$item->Storefront->StoreCategoryID = $primary_store_category_id;
            }

            if ( intval( $secondary_store_category_id ) > 0 ) {
				$item->Storefront->StoreCategory2ID = $secondary_store_category_id;
            }
            
		}

		// optional secondary store category
		if ( intval($profile_details['store_category_2_id']) > 0 ) {
			$item->Storefront->StoreCategory2ID = $profile_details['store_category_2_id'];
		}


		// adjust Site if required - eBay Motors (beta)
		$lm = new EbayCategoriesModel();
		$primary_category = $lm->getItem( $item->PrimaryCategory->CategoryID );
		if ( $primary_category['site_id'] == 100 ) {
			$item->setSite('eBayMotors');
			// echo "<pre>";print_r($primary_category);echo"</pre>";die();
		}

		return $item;

	} /* end of buildCategories() */


	public function buildShipping( $id, $item, $post_id, $profile_details ) {

		// handle flat and calc shipping
		$this->logger->info('shipping_service_type: '.$profile_details['shipping_service_type'] );
		// $isFlat = $profile_details['shipping_service_type'] != 'calc' ? true : false;
		// $isCalc = $profile_details['shipping_service_type'] == 'calc' ? true : false;

		// handle flat and calc shipping (new version)
		$service_type = $profile_details['shipping_service_type'];
		if ( $service_type == '' )     $service_type = 'Flat';
		if ( $service_type == 'flat' ) $service_type = 'Flat';
		if ( $service_type == 'calc' ) $service_type = 'Calculated';
		$isFlatLoc = ( in_array( $service_type, array('Flat','FlatDomesticCalculatedInternational') ) ) ? true : false;
		$isFlatInt = ( in_array( $service_type, array('Flat','CalculatedDomesticFlatInternational') ) ) ? true : false;
		$isCalcLoc = ! $isFlatLoc;
		$isCalcInt = ! $isFlatInt;

		$shippingDetails = new ShippingDetailsType();
		$shippingDetails->ShippingType = $service_type;
		$this->logger->info('shippingDetails->ShippingType: '.$shippingDetails->ShippingType );

		// local shipping options
		$localShippingOptions = $profile_details['loc_shipping_options'];
		$this->logger->debug('localShippingOptions: '.print_r($localShippingOptions,1));

		$pr = 1;
		foreach ($localShippingOptions as $opt) {

			$price = $this->getDynamicShipping( $opt['price'], $post_id );
			$add_price = $this->getDynamicShipping( $opt['add_price'], $post_id );
			if ( $price == '' ) $price = 0;
			if ( $opt['service_name'] == '' ) continue;

			$ShippingServiceOptions = new ShippingServiceOptionsType();
			$ShippingServiceOptions->setShippingService( $opt['service_name'] );
			$ShippingServiceOptions->setShippingServicePriority($pr);
			
			// set shipping costs for flat services
			if ( $isFlatLoc ) {
				$ShippingServiceOptions->setShippingServiceCost( $price );		
				if ( $price == 0 ) $ShippingServiceOptions->setFreeShipping( true );

				// price for additonal items
				if ( trim( $add_price ) == '' ) {
					$ShippingServiceOptions->setShippingServiceAdditionalCost( $price );
				} else {
					$ShippingServiceOptions->setShippingServiceAdditionalCost( $add_price );
				}				
			}

			$localShippingServices[]=$ShippingServiceOptions;
			$pr++;
			
			$EbayShippingModel = new EbayShippingModel();
			$lastShippingCategory = $EbayShippingModel->getShippingCategoryByServiceName( $opt['service_name'] );
			$this->logger->debug('ShippingCategory: '.print_r($lastShippingCategory,1));
		}
		$shippingDetails->setShippingServiceOptions($localShippingServices, null);


		// $intlShipping = array(
		// 	'UK_RoyalMailAirmailInternational' => array (
		// 		'Europe' => 1,
		// 		'Worldwide' => 1.50
		// 	),
		// 	'UK_RoyalMailInternationalSignedFor' => array (
		// 		'Europe' => 5,
		// 	)
		// );
		$intlShipping = $profile_details['int_shipping_options'];
		$this->logger->debug('intlShipping: '.print_r($intlShipping,1));

		$pr = 1;
		foreach ($intlShipping as $opt) {
			// foreach ($opt as $loc=>$price) {
				$price = $this->getDynamicShipping( $opt['price'], $post_id );
				$add_price = $this->getDynamicShipping( $opt['add_price'], $post_id );
				// if ( ( $price == '' ) || ( $opt['service_name'] == '' ) ) continue;
				if ( $price == '' ) $price = 0;
				if ( $opt['location'] == '' ) continue;
				if ( $opt['service_name'] == '' ) continue;

				$InternationalShippingServiceOptions = new InternationalShippingServiceOptionsType();
				$InternationalShippingServiceOptions->setShippingService( $opt['service_name'] );
				$InternationalShippingServiceOptions->setShippingServicePriority($pr);
				$InternationalShippingServiceOptions->setShipToLocation( $opt['location'] );

				// set shipping costs for flat services
				if ( $isFlatInt ) {
					$InternationalShippingServiceOptions->setShippingServiceCost( $price );
					if ( trim( $add_price ) == '' ) {
						$InternationalShippingServiceOptions->setShippingServiceAdditionalCost( $price );
					} else {
						$InternationalShippingServiceOptions->setShippingServiceAdditionalCost( $add_price );
					}				
				}
				$shippingInternational[]=$InternationalShippingServiceOptions;
				$pr++;
			// }
		}
		// only set international shipping if $intlShipping array contains one or more valid items
		if ( @$intlShipping[0]['service_name'] != '' )
			$shippingDetails->setInternationalShippingServiceOption($shippingInternational,null);

		// set CalculatedShippingRate
		if ( $isCalcLoc || $isCalcInt ) {
			$calculatedShippingRate = new CalculatedShippingRateType();
			$calculatedShippingRate->setOriginatingPostalCode( $profile_details['postcode'] );
			
			// if ( $isCalcInt ) $calculatedShippingRate->setShippingPackage( 'PackageThickEnvelope' );
			// TODO: separate ShippingPackage field in profile from local / int shipping
			if ( $isCalcInt ) $calculatedShippingRate->setShippingPackage( $localShippingOptions[0]['ShippingPackage'] );
			if ( $isCalcLoc ) $calculatedShippingRate->setShippingPackage( $localShippingOptions[0]['ShippingPackage'] );

			if ( $isCalcLoc ) {
				$calculatedShippingRate->setPackagingHandlingCosts( floatval( @$profile_details['PackagingHandlingCosts'] ) );	
			} 
			if ( $isCalcInt ) {
				$calculatedShippingRate->setPackagingHandlingCosts( floatval( @$profile_details['PackagingHandlingCosts'] ) );	
				$calculatedShippingRate->setInternationalPackagingHandlingCosts( floatval( @$profile_details['InternationalPackagingHandlingCosts'] ) );
			}

			list( $weight_major, $weight_minor ) = ProductWrapper::getEbayWeight( $post_id );
			$calculatedShippingRate->setWeightMajor( floatval( $weight_major) );
			$calculatedShippingRate->setWeightMinor( floatval( $weight_minor) );

			$dimensions = ProductWrapper::getDimensions( $post_id );
			if ( trim( @$dimensions['width']  ) != '' ) $calculatedShippingRate->setPackageWidth( $dimensions['width'] );
			if ( trim( @$dimensions['length'] ) != '' ) $calculatedShippingRate->setPackageLength( $dimensions['length'] );
			if ( trim( @$dimensions['height'] ) != '' ) $calculatedShippingRate->setPackageDepth( $dimensions['height'] );

			// debug
			// $weight = ProductWrapper::getWeight( $post_id ) ;
			// $this->logger->info('weight: '.print_r($weight,1));
			// $this->logger->info('dimensions: '.print_r($dimensions,1));


			$shippingDetails->setCalculatedShippingRate( $calculatedShippingRate );
		}

		// global shipping
		if ( @$profile_details['global_shipping'] == 1 ) {
			$shippingDetails->setGlobalShipping( true ); // available since api version 781
		}
		if ( get_post_meta( $post_id, '_ebay_global_shipping', true ) == 'yes' ) {
			$shippingDetails->setGlobalShipping( true );
		}

		// Payment Instructions
		if ( trim( @$profile_details['payment_instructions'] ) != '' ) {
			$shippingDetails->setPaymentInstructions( nl2br( $profile_details['payment_instructions'] ) );
		}
		if ( trim( get_post_meta( $post_id, '_ebay_payment_instructions', true ) ) != '' ) {
			$shippingDetails->setPaymentInstructions( nl2br( get_post_meta( $post_id, '_ebay_payment_instructions', true ) ) );
		}
		
		// check if we have local pickup only
		if ( ( count($localShippingOptions) == 1 ) && ( $lastShippingCategory == 'PICKUP' ) ) {

			$item->setShipToLocations( 'None' );
			$item->setDispatchTimeMax( null );
			$this->logger->info('PICKUP ONLY mode');

			// don't set ShippingDetails for pickup-only in UK!
			if ( $item->Site != 'UK' ) {
				$item->setShippingDetails($shippingDetails);
			}

		} else {
			$item->setShippingDetails($shippingDetails);
		}


		return $item;

	} /* end of buildShipping() */

	public function buildItemSpecifics( $id, $item ) {

    	// new ItemSpecifics
    	$ItemSpecifics = new NameValueListArrayType();

		// get listing data
		$listing = $this->lm->getItem( $id );

		// get product attributes
		$processed_attributes = array();
        $attributes = ProductWrapper::getAttributes( $listing['post_id'] );
		$this->logger->info('product attributes: '. ( sizeof($attributes)>0 ? print_r($attributes,1) : '-- empty --' ) );


		// apply item specifics from profile
		$specifics = $listing['profile_data']['details']['item_specifics'];
		$this->logger->debug('item_specifics: '.print_r($specifics,1));
        foreach ($specifics as $spec) {
        	if ( $spec['value'] != '' ) {
        		
        		$value = $spec['value'];
        		if ( mb_strlen( $value ) > 50 ) continue;

	            $NameValueList = new NameValueListType();
		    	$NameValueList->setName ( $spec['name']  );
	    		$NameValueList->setValue( $value );
	        	if ( ! in_array( $spec['name'], $this->variationAttributes ) ) {
		        	$ItemSpecifics->addNameValueList( $NameValueList );
		        	$processed_attributes[] = $spec['name'];
					$this->logger->info("specs: added custom value: {$spec['name']} - $value");
	        	}
        	} elseif ( $spec['attribute'] != '' ) {

        		$value = $attributes[ $spec['attribute'] ];
        		if ( '_sku' == $spec['attribute'] ) $value = ProductWrapper::getSKU( $listing['post_id'] );
        		if ( mb_strlen( $value ) > 50 ) continue;

	            $NameValueList = new NameValueListType();
		    	$NameValueList->setName ( $spec['name']  );
	    		$NameValueList->setValue( $value );
	        	if ( ! in_array( $spec['name'], $this->variationAttributes ) ) {
		        	$ItemSpecifics->addNameValueList( $NameValueList );
		        	$processed_attributes[] = $spec['attribute'];
					$this->logger->info("specs: added product attribute: {$spec['name']} - $value");
	        	}
        	}
        }

        // skip if item has no attributes
        // if ( count($attributes) == 0 ) return $item;

    	// add ItemSpecifics from product attributes
    	// disabled for now, since it causes duplicates and it's not actually required anymore
    	// enabled again - mostly for free version
    	// TODO: make this an option (globally?)
        foreach ($attributes as $name => $value) {

    		if ( mb_strlen( $value ) > 50 ) continue;

            $NameValueList = new NameValueListType();
	    	$NameValueList->setName ( $name  );
    		$NameValueList->setValue( $value );
        	
        	// only add attribute to ItemSpecifics if not already present in variations or processed attributes
        	if ( ( ! in_array( $name, $this->variationAttributes ) ) && ( ! in_array( $name, $processed_attributes ) ) ) {
	        	$ItemSpecifics->addNameValueList( $NameValueList );
        	}
        }

        if ( count($ItemSpecifics) > 0 ) {
    		$item->setItemSpecifics( $ItemSpecifics );        	
			$this->logger->info( count($ItemSpecifics) . "item specifics were added.");
        }

		return $item;

	} /* end of buildItemSpecifics() */

	public function buildVariations( $id, $item, $profile_details ) {

		// build variations
		$item->Variations = new VariationsType();

		// get product variations
		$p = $this->lm->getItem( $id );
        $variations = ProductWrapper::getVariations( $p['post_id'] );

        // loop each combination
        foreach ($variations as $var) {

        	$newvar = new VariationType();

        	// handle price
			$newvar->StartPrice = $this->lm->applyProfilePrice( $var['price'], $profile_details['start_price'] );

        	// handle variation quantity - if no quantity set in profile
        	if ( intval( $item->Quantity ) == 0 ) {
        		$newvar->Quantity   = intval( $var['stock'] );
        	} else {
	        	$newvar->Quantity 	= $item->Quantity;
        	}

			// handle sku
        	if ( $var['sku'] != '' ) {
        		$newvar->SKU = $var['sku'];
        	}

        	// add VariationSpecifics (v2)
        	$VariationSpecifics = new NameValueListArrayType();
            foreach ($var['variation_attributes'] as $name => $value) {
	            $NameValueList = new NameValueListType();
    	    	$NameValueList->setName ( $name  );
        		$NameValueList->setValue( $value );
	        	$VariationSpecifics->addNameValueList( $NameValueList );
            }

        	$newvar->setVariationSpecifics( $VariationSpecifics );

			$item->Variations->addVariation( $newvar );
        }

        // build temporary array for VariationSpecificsSet
    	$tmpVariationSpecificsSet = array();
        foreach ($variations as $var) {

            foreach ($var['variation_attributes'] as $name => $value) {
    	    	if ( ! is_array($tmpVariationSpecificsSet[ $name ]) ) {
		        	$tmpVariationSpecificsSet[ $name ] = array();
    	    	}
	        	if ( ! in_array( $value, $tmpVariationSpecificsSet[ $name ] ) ) {
	        		$tmpVariationSpecificsSet[ $name ][] = $value;	        		
	        	}
            }

        }
        // build VariationSpecificsSet
    	$VariationSpecificsSet = new NameValueListArrayType();
        foreach ($tmpVariationSpecificsSet as $name => $values) {

			$NameValueList = new NameValueListType();
        	$NameValueList->setName ( $name );
            foreach ($values as $value) {
	        	$NameValueList->addValue( $value );
	        }
	    	$VariationSpecificsSet->addNameValueList( $NameValueList );

        }
    	$item->Variations->setVariationSpecificsSet( $VariationSpecificsSet );

        
        // build array of variation attributes, which will be needed in builtItemSpecifics()
        $this->variationAttributes = array();
        foreach ($tmpVariationSpecificsSet as $key => $value) {
        	$this->variationAttributes[] = $key;
        }
        // $this->logger->info('variationAttributes: '.print_r($this->variationAttributes,1));


        // select *one* VariationSpecificsSet for Pictures set
        // currently the first one is selected automatically, but there will be preferences for this later
        $VariationValuesForPictures =  reset($tmpVariationSpecificsSet);
        $VariationNameForPictures   =    key($tmpVariationSpecificsSet);

        // build Pictures
    	$Pictures = new PicturesType();
    	$Pictures->setVariationSpecificName ( $VariationNameForPictures );
        foreach ($variations as $var) {

        	$VariationValue = $var['variation_attributes'][$VariationNameForPictures];

        	if ( in_array( $VariationValue, $VariationValuesForPictures ) ) {
		    	$VariationSpecificPictureSet = new VariationSpecificPictureSetType();
    	    	$VariationSpecificPictureSet->setVariationSpecificValue( $VariationValue );
        		$VariationSpecificPictureSet->addPictureURL( $this->encodeUrl( $var['image'] ) );

		        // only list variation images if enabled
        		if ( @$profile_details['with_variation_images'] != '0' ) {
	    			$Pictures->addVariationSpecificPictureSet( $VariationSpecificPictureSet );
		        }
	    
	    		// remove value from VariationValuesForPictures to avoid duplicates
	    		unset( $VariationValuesForPictures[ array_search( $VariationValue, $VariationValuesForPictures ) ] );
        	}

        }
    	$item->Variations->setPictures( $Pictures );

    	// ebay doesn't allow different weight and dimensions for varations
    	// so for calculated shipping services we just fetch those from the first variation
    	// and overwrite 

		// $isCalc = $profile_details['shipping_service_type'] == 'calc' ? true : false;
		$service_type = $profile_details['shipping_service_type'];
		$isCalc = ( in_array( $service_type, array('calc','FlatDomesticCalculatedInternational' ,'CalculatedDomesticFlatInternational') ) ) ? true : false;

		if ( $isCalc ) {

			// get weight and dimensions from first variation
			$weight_major = $variations[0]['weight_major'];
			$weight_minor = $variations[0]['weight_minor'];
			$dimensions = $variations[0]['dimensions'];

			$item->ShippingDetails->CalculatedShippingRate->setWeightMajor( floatval( $weight_major ) );
			$item->ShippingDetails->CalculatedShippingRate->setWeightMinor( floatval( $weight_minor ) );

			if ( trim( @$dimensions['width']  ) != '' ) $item->ShippingDetails->CalculatedShippingRate->setPackageWidth( $dimensions['width'] );
			if ( trim( @$dimensions['length'] ) != '' ) $item->ShippingDetails->CalculatedShippingRate->setPackageLength( $dimensions['length'] );
			if ( trim( @$dimensions['height'] ) != '' ) $item->ShippingDetails->CalculatedShippingRate->setPackageDepth( $dimensions['height'] );

			// debug
			$this->logger->info('first variations weight: '.print_r($weight,1));
			$this->logger->info('first variations dimensions: '.print_r($dimensions,1));
		}


        // remove some settings from single item
		$item->SKU = null;
		$item->Quantity = null;
		$item->StartPrice = null;
		$item->BuyItNowPrice = null;

		return $item;
		
		/* this we should get:
		<Variations>
		    <Variation>
		        <SKU />
		        <StartPrice>15</StartPrice>
		        <Quantity>1</Quantity>
		        <VariationSpecifics>
		            <NameValueList>
		                <Name>Size</Name>
		                <Value>large</Value>
		            </NameValueList>
		        </VariationSpecifics>
		    </Variation>
		    <Variation>
		        <SKU />
		        <StartPrice>10</StartPrice>
		        <Quantity>1</Quantity>
		        <VariationSpecifics>
		            <NameValueList>
		                <Name>Size</Name>
		                <Value>small</Value>
		            </NameValueList>
		        </VariationSpecifics>
		    </Variation>
		    <Pictures>
		        <VariationSpecificName>Size</VariationSpecificName>
		        <VariationSpecificPictureSet>
		            <VariationSpecificValue>large</VariationSpecificValue>
		            <PictureURL>http://www.example.com/wp-content/uploads/2011/09/grateful-dead.jpg</PictureURL>
		        </VariationSpecificPictureSet>
		        <VariationSpecificPictureSet>
		            <VariationSpecificValue>small</VariationSpecificValue>
		            <PictureURL>www.example.com/wp-content/uploads/2011/09/grateful-dead.jpg</PictureURL>
		        </VariationSpecificPictureSet>
		    </Pictures>
		    <VariationSpecificsSet>
		        <NameValueList>
		            <Name>Size</Name>
		            <Value>large</Value>
		            <Value>small</Value>
		        </NameValueList>
		    </VariationSpecificsSet>
		</Variations>
		*/

	}


	public function flattenVariations( $id, $item, $profile_details ) {

		// get product variations
		$p = $this->lm->getItem( $id );
        $variations = ProductWrapper::getVariations( $p['post_id'] );
		$this->logger->info("flattenVariations($id)");

		// fetch first variations start price
		if ( intval($item->StartPrice->value) == 0 ) {

			$start_price = $variations[0]['price'];
			$start_price = $this->lm->applyProfilePrice( $start_price, $profile_details['start_price'] );
			$item->StartPrice->setTypeValue( $start_price );
			$this->logger->info("using first variations price: ".print_r($item->StartPrice->value,1));

		}


    	// ebay doesn't allow different weight and dimensions for varations
    	// so for calculated shipping services we just fetch those from the first variation
    	// and overwrite 

		// $isCalc = $profile_details['shipping_service_type'] == 'calc' ? true : false;
		$service_type = $profile_details['shipping_service_type'];
		$isCalc = ( in_array( $service_type, array('calc','FlatDomesticCalculatedInternational' ,'CalculatedDomesticFlatInternational') ) ) ? true : false;

		if ( $isCalc ) {

			// get weight and dimensions from first variation
			$weight_major = $variations[0]['weight_major'];
			$weight_minor = $variations[0]['weight_minor'];
			$dimensions = $variations[0]['dimensions'];

			$item->ShippingDetails->CalculatedShippingRate->setWeightMajor( floatval( $weight_major ) );
			$item->ShippingDetails->CalculatedShippingRate->setWeightMinor( floatval( $weight_minor ) );

			if ( trim( @$dimensions['width']  ) != '' ) $item->ShippingDetails->CalculatedShippingRate->setPackageWidth( $dimensions['width'] );
			if ( trim( @$dimensions['length'] ) != '' ) $item->ShippingDetails->CalculatedShippingRate->setPackageLength( $dimensions['length'] );
			if ( trim( @$dimensions['height'] ) != '' ) $item->ShippingDetails->CalculatedShippingRate->setPackageDepth( $dimensions['height'] );

			// debug
			$this->logger->info('first variations weight: '.print_r($weight,1));
			$this->logger->info('first variations dimensions: '.print_r($dimensions,1));
		}

		return $item;

	} /* end of flattenVariations() */



	public function checkItem( $item ) {

		$success = true;
		$this->VariationsHaveStock = false;


		// check StartPrice, Quantity and SKU
		if ( is_object( $item->Variations ) ) {
			// item has variations

			$VariationsHaveStock = false;
			$VariationsSkuArray = array();
			$VariationsSkuAreUnique = true;

			// check each variation
			foreach ($item->Variations->Variation as $var) {
				
				// StartPrice must be greater than 0
				if ( intval($var->StartPrice) == 0 ) {
					$longMessage = __('Some variations seem to have no price.','wplister');
					$success = false;
				}

				// Quantity must be greater than 0 - at least for one variation
				if ( intval($var->Quantity) > 0 ) $VariationsHaveStock = true;

				// SKUs must be unique - if present
				if ( ($var->SKU) != '' ) {
					if ( in_array( $var->SKU, $VariationsSkuArray )) {
						$VariationsSkuAreUnique = false;
					} else {
						$VariationsSkuArray[] = $var->SKU;
					}
				} 

				// VariationSpecifics values can't be longer than 50 characters
				foreach ($var->VariationSpecifics->NameValueList as $spec) {
					if ( strlen($spec->Value) > 50 ) {
						$longMessage = __('eBay does not allow attribute values longer than 50 characters.','wplister');
						$longMessage .= '<br>';
						$longMessage .= __('You need to shorten this value:','wplister') . ' <code>'.$spec->Value.'</code>';
						$success = false;
					}
				}

			}

			if ( ! $VariationsSkuAreUnique ) {
				foreach ($item->Variations->Variation as &$var) {
					$var->SKU = '';
				}
				$longMessage = __('You are using the same SKU for more than one variations which is not allowed by eBay.','wplister');
				$longMessage .= '<br>';
				$longMessage .= __('To circumvent this issue, your item will be listed without SKU.','wplister');
				// $success = false;
			}

			if ( ! $VariationsHaveStock ) {
				$longMessage = __('None of these variations are in stock.','wplister');
				$success = false;
			}

			// make this info available to reviseItem()
			$this->VariationsHaveStock = $VariationsHaveStock;

		} else {
			// item has no variations

			// StartPrice must be greater than 0
			if ( intval($item->StartPrice) == 0 ) {
				$longMessage = __('Price can not be zero.','wplister');
				$success = false;
			}

			// check minimum start price if found
			$min_prices = get_option( 'wplister_MinListingStartPrices', array() );
			$listing_type = $item->ListingType ? $item->ListingType : 'FixedPriceItem';
			if ( isset( $min_prices[ $listing_type ] ) ) {
				$min_price = $min_prices[ $listing_type ];
				if ( $item->StartPrice->value < $min_price ) {
					$longMessage = sprintf( __('eBay requires a minimum price of %s for this listing type.','wplister'), $min_price );
					$success = false;
				}
			}

		}

		// ItemSpecifics values can't be longer than 50 characters
		foreach ($item->ItemSpecifics->NameValueList as $spec) {
			if ( strlen($spec->Value) > 50 ) {
				$longMessage = __('eBay does not allow attribute values longer than 50 characters.','wplister');
				$longMessage .= '<br>';
				$longMessage .= __('You need to shorten this value:','wplister') . ' <code>'.$spec->Value.'</code>';
				$success = false;
			}
		}

		// PrimaryCategory->CategoryID must be greater than 0
		if ( intval( @$item->PrimaryCategory->CategoryID ) == 0 ) {
			$longMessage = __('There has been no primary category assigned.','wplister');
			$success = false;
		}

		// check for main image
		if ( trim( @$item->PictureDetails->GalleryURL ) == '' ) {
			$longMessage = __('You need to add at least one image to your product.','wplister');
			$success = false;
		}

		if ( ! $success && ! $this->is_ajax() ) {
			$this->showMessage( $longMessage, 1, true );
		} elseif ( ( $longMessage != '' ) && ! $this->is_ajax() ) {
			$this->showMessage( $longMessage, 0, true );
		}

		$htmlMsg  = '<div id="message" class="error" style="display:block !important;"><p>';
		$htmlMsg .= '<b>' . 'This item did not pass the validation check' . ':</b>';
		$htmlMsg .= '<br>' . $longMessage . '';
		$htmlMsg .= '</p></div>';

		// save error as array of objects
		$errorObj = new stdClass();
		$errorObj->SeverityCode = 'Validation';
		$errorObj->ErrorCode 	= '42';
		$errorObj->ShortMessage = $longMessage;
		$errorObj->LongMessage 	= $longMessage;
		$errorObj->HtmlMessage 	= $htmlMsg;
		$errors = array( $errorObj );

		// save results as local property
		$this->result = new stdClass();
		$this->result->success = $success;
		$this->result->errors  = $errors;

		return $success;

	} /* end of checkItem() */


	public function getDynamicShipping( $price, $post_id ) {
		
		// return price if no mapping
		if ( ! substr( $price, 0, 1 ) == '[' ) return floatval($price);

		// split values list			
		$values = substr( $price, 1, -1 );
		$values = explode( '|', $values );

		// first item is mode
		$mode = array_shift($values);


		// weight mode
		if ( $mode == 'weight' ) {

			$product_weight = ProductWrapper::getWeight( $post_id );
			foreach ($values as $val) {
				list( $limit, $price ) = explode(':', $val);
				if ( $product_weight >= $limit) $shipping_cost = $price;
			}
			return floatval($shipping_cost);
		}
		
		// convert '0.00' to '0' - ebay api doesn't like '0.00'
		if ( $price == 0 ) $price = '0';

		return floatval($price);

	}


	public function prepareTitleAsHTML( $title ) {

		$this->logger->debug('prepareTitleAsHTML()  in: ' . $title );
		$title = htmlentities( $title, ENT_QUOTES, 'UTF-8', false );
		$this->logger->debug('prepareTitleAsHTML() out: ' . $title );
		return $title;
	}


	public function prepareTitle( $title ) {

		$this->logger->info('prepareTitle()  in: ' . $title );
		$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );

        // limit item title to 80 characters
        if ( mb_strlen($title) > 80 ) $title = mb_substr( $title, 0, 77 ) . '...';

		$this->logger->info('prepareTitle() out: ' . $title );
		return $title;
	}
	

	public function getFinalHTML( $id ) {
		
		// get item data
		$item = $this->lm->getItem( $id );

		// use latest post_content from product
		$post = get_post( $item['post_id'] );
		if ( ! empty($post->post_content) ) $item['post_content'] = $post->post_content;

		// load template
		$template = new TemplatesModel( $item['template'] );
		$html = $template->processItem( $item );

		// return html
		return $html;
	}


	public function getProductMainImageURL( $post_id, $checking_parent = false ) {

		// check if custom post meta field 'ebay_image_url' exists
		if ( get_post_meta( $post_id, 'ebay_image_url', true ) ) {
			return $this->removeHttpsFromUrl( get_post_meta( $post_id, 'ebay_image_url', true ) );
		}

		// this seems to be neccessary for listing previews on some installations 
		if ( ! function_exists('get_post_thumbnail_id')) 
		require_once( ABSPATH . 'wp-includes/post-thumbnail-template.php');

		$large_image_url = ProductWrapper::getImageURL( $post_id );
		if ( $large_image_url ) {
			$image_url = $large_image_url;
		} else {
			$images = $this->getProductImagesURL( $post_id );
			$image_url = @$images[0];
		}

		// check if featured image comes from nextgen gallery
		if ( $this->is_plugin_active('nextgen-gallery/nggallery.php') ) {
			$thumbnail_id = get_post_meta($post_id, '_thumbnail_id', true);
			if ( 'ngg' == substr($thumbnail_id, 0, 3) ) {
				$imageID = str_replace('ngg-', '', $thumbnail_id);
				$picture = nggdb::find_image($imageID);
				$image_url = $picture->imageURL;
				// $this->logger->info( "NGG - picture: " . print_r($picture,1) );
				$this->logger->info( "NGG - image_url: " . print_r($image_url,1) );
			}
		}

		if ( ( $image_url == '' ) && ( ! $checking_parent ) ) {
			// $parents = get_post_ancestors( $post_id );
			$post = get_post($post_id);
			$parent_id = isset($post->post_parent) ? $post->post_parent : false;
			if ( $parent_id ) {
				return $this->getProductMainImageURL( $parent_id, true);
			}
		}

		// ebay doesn't accept https - only http and ftp
		$image_url = $this->removeHttpsFromUrl( $image_url );
		
		return $image_url;

	}

	public function getProductImagesURL( $id ) {
		global $wpdb;

    	$results = $wpdb->get_results( 
			"
			SELECT id, guid 
			FROM {$wpdb->prefix}posts
			WHERE post_type = 'attachment' 
			  AND post_parent = '$id' 
			ORDER BY menu_order
			"
		);
		$this->logger->debug( "getProductImagesURL( $id ) : " . print_r($results,1) );
        #echo "<pre>";print_r($results);echo"</pre>";#die();

		// fetch images using default size
		$size = get_option( 'wplister_default_image_size', 'full' );
		
		$images = array();
		foreach($results as $row) {
            // $url = wp_get_attachment_url( $row->id, $size );
            $url = $row->guid ? $row->guid : wp_get_attachment_url( $row->id, $size );
			$images[] = $url;
		}

		// support for WooCommerce 2.0 Product Gallery
		if ( get_option( 'wplister_wc2_gallery_fallback','attached' ) == 'none' ) $images = array(); // discard images if fallback is disabled
		$product_image_gallery = get_post_meta( $id, '_product_image_gallery', true );
		if ( $product_image_gallery ) {
			
			// build clean array with main image as first item
			$images = array();
			$images[] = $this->getProductMainImageURL( $id );

			$image_ids = explode(',', $product_image_gallery );
			foreach ( $image_ids as $image_id ) {
	            $url = wp_get_attachment_url( $image_id, $size );
				if ( $url && ! in_array($url, $images) ) $images[] = $url;
			}
			
			$this->logger->info( "found WC2 product gallery images for product #$id " . print_r($images,1) );
		}

		// Shopp stores images in db by default...
		if ( ProductWrapper::plugin == 'shopp' ) {
			$images = ProductWrapper::getAllImages( $id );
			// $this->logger->info( "SHOPP - getAllImages( $id ) : " . print_r($images,1) );
		}

		$product_images = array();
		foreach($images as $imageurl) {
			$product_images[] = $this->removeHttpsFromUrl( $imageurl );
		}

		// call wplister_product_images filter 
		// hook into this from your WP theme's functions.php - this won't work in listing templates!
		$product_images = apply_filters( 'wplister_product_images', $product_images, $id );

		return $product_images;
	}


	// ebay doesn't accept image urls using https - only http and ftp
	function removeHttpsFromUrl( $url ) {

		// fix relative urls
		if ( '/wp-content/' == substr( $url, 0, 12 ) ) {
			$url = str_replace('/wp-content', content_url(), $url);
		}

		// fix https urls
		$url = str_replace( 'https://', 'http://', $url );
		$url = str_replace( ':443', '', $url );

		return $url;
	}
	
	// encode special characters and spaces for PictureURL
	function encodeUrl( $url ) {
		$url = rawurlencode( $url );
		// $url = str_replace(' ', '%20', $url );
		$url = str_replace('%2F', '/', $url );
		$url = str_replace('%3A', ':', $url );
		return $url;
	}
	

}
