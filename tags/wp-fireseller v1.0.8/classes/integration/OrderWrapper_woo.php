<?php
/**
 * wrapper functions to access orders on WooCommerce
 */

class OrderWrapper {
	
	const plugin = 'woo';
	const post_type = 'shop_order';
	
	// get custom post type
	static function getPostType() {
		return self::post_type;
	}	
	
	// update order from transaction
	static function updateOrderFromTransaction( $id ) {
		// global $wpdb;
		// global $wpl_logger;
		// $wpl_logger->info( 'updateOrderFromTransaction #'.$id );

		// get transaction details
		$transactionsModel = new TransactionsModel();		
		$item              = $transactionsModel->getItem( $id );
		$post_id           = $item['wp_order_id'];
		// $details           = $item['details'];

		// get order
		$order = new WC_Order( $post_id );
		
		// do nothing if order is already marked as completed
		if ( $order->status == 'completed' ) return $post_id;

		// update order status
		if ( $item['CompleteStatus'] == 'Complete') {
			$new_order_status = get_option( 'wplister_new_order_status', 'completed' );
		} else {
			$new_order_status = 'pending';
		}

		// update order status
		if ( $order->status != $new_order_status ) {

			$history_message = "Order #$post_id status was updated from {$order->status} to $new_order_status";
			$history_details = array( 'order_id' => $post_id );
			$transactionsModel->addHistory( $item['transaction_id'], 'update_order', $history_message, $history_details );

			$order->update_status( $new_order_status );

		}

		return $post_id;

	}	
	
	// create order from transaction
	static function createOrderFromTransaction( $id ) {
		global $wpdb;
		global $wpl_logger;

		// get transaction details
		$transactionsModel = new TransactionsModel();		
		$item = $transactionsModel->getItem( $id );
		$details = $item['details'];

		$date_created = $item['date_created'];
		$post_date_gmt = date_i18n( 'Y-m-d H:i:s', strtotime($item['date_created']), true );
		$post_date     = date_i18n( 'Y-m-d H:i:s', strtotime($item['date_created']), false );

		// Create shop_order post object
		$post_data = array(
		    'post_title' => 'Order &ndash; '.date('F j, Y @ h:i A', strtotime( $date_created ) ),
		    'post_content' => '',
		    'post_excerpt' => stripslashes( $details->BuyerCheckoutMessage . "\n" . 'eBay ID: ' . $details->Buyer->UserID . "\n" . 'Transaction ID: ' . $item['transaction_id'] ),
			'post_date' 	 => $post_date, //The time post was made.
			'post_date_gmt'  => $post_date_gmt, //The time post was made, in GMT.
			'post_type' => 'shop_order',
		    'comment_status' => 'closed',
		    'ping_status' => 'closed',
		    'post_status' => 'publish'
		);

		// Insert order into the database
		$post_id = wp_insert_post( $post_data );

		// Update wp_order_id of transaction record
		$transactionsModel->updateWpOrderID( $id, $post_id );	

		/* the following code is inspired by woocommerce_process_shop_order_meta() in writepanel-order_data.php */

		// Add key
		add_post_meta( $post_id, '_order_key', uniqid('order_'), true );

		// Update post data
		update_post_meta( $post_id, '_transaction_id', $id );
		update_post_meta( $post_id, '_ebay_item_id', $item['item_id'] );
		update_post_meta( $post_id, '_ebay_transaction_id', $item['transaction_id'] );


		$billing_details = $details->Buyer->BuyerInfo->ShippingAddress;
		$shipping_details = $details->Buyer->BuyerInfo->ShippingAddress;

		// optional billing address / RegistrationAddress
		if ( isset( $details->Buyer->RegistrationAddress ) ) {
			$billing_details = $details->Buyer->RegistrationAddress;
		}

		// optional fields
		if ($billing_details->Phone == 'Invalid Request') $billing_details->Phone = '';
		update_post_meta( $post_id, '_billing_phone', stripslashes( $billing_details->Phone ));

		// billing address
		@list( $billing_firstname, $billing_lastname )     = explode( " ", $billing_details->Name, 2 );
		update_post_meta( $post_id, '_billing_first_name', 	stripslashes( $billing_firstname ) );
		update_post_meta( $post_id, '_billing_last_name', 	stripslashes( $billing_lastname ) );
		update_post_meta( $post_id, '_billing_company', 	stripslashes( $billing_details->CompanyName ) );
		update_post_meta( $post_id, '_billing_address_1', 	stripslashes( $billing_details->Street1 ) );
		update_post_meta( $post_id, '_billing_address_2', 	stripslashes( $billing_details->Street2 ) );
		update_post_meta( $post_id, '_billing_city', 		stripslashes( $billing_details->CityName ) );
		update_post_meta( $post_id, '_billing_postcode', 	stripslashes( $billing_details->PostalCode ) );
		update_post_meta( $post_id, '_billing_country', 	stripslashes( $billing_details->Country ) );
		update_post_meta( $post_id, '_billing_state', 		stripslashes( $billing_details->StateOrProvince ) );
		
		// shipping address
		@list( $shipping_firstname, $shipping_lastname )   = explode( " ", $shipping_details->Name, 2 );
		update_post_meta( $post_id, '_shipping_first_name', stripslashes( $shipping_firstname ) );
		update_post_meta( $post_id, '_shipping_last_name', 	stripslashes( $shipping_lastname ) );
		update_post_meta( $post_id, '_shipping_company', 	stripslashes( $shipping_details->CompanyName ) );
		update_post_meta( $post_id, '_shipping_address_1', 	stripslashes( $shipping_details->Street1 ) );
		update_post_meta( $post_id, '_shipping_address_2', 	stripslashes( $shipping_details->Street2 ) );
		update_post_meta( $post_id, '_shipping_city', 		stripslashes( $shipping_details->CityName ) );
		update_post_meta( $post_id, '_shipping_postcode', 	stripslashes( $shipping_details->PostalCode ) );
		update_post_meta( $post_id, '_shipping_country', 	stripslashes( $shipping_details->Country ) );
		update_post_meta( $post_id, '_shipping_state', 		stripslashes( $shipping_details->StateOrProvince ) );
		
		// order details
		update_post_meta( $post_id, '_billing_email', stripslashes( $details->Buyer->Email ));
		update_post_meta( $post_id, '_order_shipping', stripslashes( $details->ShippingServiceSelected->ShippingServiceCost->value ));
		update_post_meta( $post_id, '_cart_discount', '');
		update_post_meta( $post_id, '_order_discount', '');
		update_post_meta( $post_id, '_customer_user', '0' );
		update_post_meta( $post_id, '_order_tax', '0.00' );
		update_post_meta( $post_id, '_order_shipping_tax', '0.00' );

		
		// Shipping method handling
		update_post_meta( $post_id, '_shipping_method', stripslashes( $details->ShippingServiceSelected->ShippingService )); // TODO: mapping
		$sm = new EbayShippingModel();
		$shipping_title = $sm->getTitleByServiceName( $details->ShippingServiceSelected->ShippingService );
		update_post_meta( $post_id, '_shipping_method_title', $shipping_title );


		// Payment method handling
		update_post_meta( $post_id, '_payment_method', stripslashes( $details->Status->PaymentMethodUsed )); // TODO: mapping
		$pm = new EbayPaymentModel();
		$payment_title = $pm->getTitleByServiceName( $details->Status->PaymentMethodUsed );
		update_post_meta( $post_id, '_payment_method_title', $payment_title );
	

		// Tax rows
		$order_taxes = array();
		// [...]		
		update_post_meta( $post_id, '_order_taxes', $order_taxes );
			
	
		// Order item(s)
		 
		// get listing item from db
		$listingsModel = new ListingsModel();
		$listingItem = $listingsModel->getItemByEbayID( $details->Item->ItemID );
		// if (!$listingItem) return false;

		$product_id			= $listingItem ? $listingItem->post_id : $details->Item->ItemID;
		$item_name 			= $listingItem ? $listingItem->auction_title : $details->Item->Title;
		$item_quantity 		= $details->QuantityPurchased;
		
		$line_subtotal		= $item_quantity * $details->TransactionPrice->value;
		$line_subtotal_tax	= '0.00';
		
		$line_total 		= $item_quantity * $details->TransactionPrice->value;
		$line_tax		 	= '0.00';

		$item_tax_class		= '';


		// shipping fee
		if ( isset( $details->ActualShippingCost->value ) ) {

			// ActualShippingCost
			$shipping_fee = $details->ActualShippingCost->value;
			$wpl_logger->info('using ActualShippingCost: '.$shipping_fee );

		} elseif ( isset( $details->ShippingServiceSelected->ShippingServiceCost->value ) ) {

			// ShippingServiceSelected
			$shipping_fee = $details->ShippingServiceSelected->ShippingServiceCost->value;
			$wpl_logger->info('using ActualShippingCost: '.$shipping_fee );

		} else {

			// no shipping fee found!
			$shipping_fee = 0;
			$wpl_logger->error('no shipping fee found in transaction!' );

		}
		

		// order total
		if ( $details->TransactionPrice->value > 0 ) {
			// if TransactionPrice is set, add shipping_fee and use as order total
			$order_total 	= $item_quantity * $details->TransactionPrice->value + $shipping_fee;
			$wpl_logger->info('using TransactionPrice: '.$details->TransactionPrice->value );
			$wpl_logger->info('total TransactionPrice: '.$details->TransactionPrice->value * $item_quantity );

		// AmountPaid doesn't work on multiple item orders yet
		// } elseif ( $details->AmountPaid->value > 0 ) {
		// 	// if AmountPaid is set, use this as order total
		// 	$order_total 	= $details->AmountPaid->value ;
		// 	$wpl_logger->info('using AmountPaid: '.$details->AmountPaid->value );
		// } elseif ( $details->ConvertedAmountPaid->value > 0 ) {
		// 	// sometimes AmountPaid is 0.0 while ConvertedAmountPaid contains the correct order total
		// 	$order_total 	= $details->ConvertedAmountPaid->value ;
		// 	$wpl_logger->info('using ConvertedAmountPaid: '.$details->ConvertedAmountPaid->value );

		} else {
			// this is a bit redundant as $line_total is already calculated from TransactionPrice...
			$order_total 	= $line_total + $details->ShippingServiceSelected->ShippingServiceCost->value;
			$wpl_logger->info('using line_total + shipping: '.$line_total );
		}
		// $wpl_logger->info('transaction details: '.print_r($details,1) );


		// if payment is incomplete, we take the calculated total instead of AmountPaid
		update_post_meta( $post_id, '_order_total', rtrim(rtrim(number_format( $order_total, 4, '.', ''), '0'), '.') );

		
		// use variation title - if supplied
		// if ( @$details->Variation->VariationTitle != '' ) {
		// 	$item_name = $details->Variation->VariationTitle;
		// }

		// process SKU - if supplied
		// if ( @$details->Item->SKU != '' ) {
		// 	$item_sku = $details->Item->SKU;
		// }

		// check if item has variation 
		$isVariation = false;
		$VariationSpecifics = array();
        if ( is_object( @$details->Variation ) ) {
            foreach ($details->Variation->VariationSpecifics as $spec) {
                $VariationSpecifics[ $spec->Name ] = $spec->Value[0];
            }
			$isVariation = true;
        } 

		// get variation_id
		if ( $isVariation ) {
			$variation_id = ProductWrapper::findVariationID( $product_id, $VariationSpecifics );
		}


		// create order line item and meta

		// WC 2.0
		if ( function_exists('woocommerce_add_order_item_meta') ) {
	
			$order_item = array();

			$order_item['product_id'] 			= $product_id;
			$order_item['variation_id'] 		= isset( $variation_id ) ? $variation_id : '';
			$order_item['name'] 				= $item_name;
			// $order_item['tax_class']			= $_product->get_tax_class();
			$order_item['tax_class']			= $item_tax_class;
			$order_item['qty'] 					= $item_quantity;
			$order_item['line_subtotal'] 		= number_format( (double) $line_subtotal, 2, '.', '' );
			$order_item['line_subtotal_tax'] 	= '';
			$order_item['line_total'] 			= number_format( (double) $line_total, 2, '.', '' );
			$order_item['line_tax'] 			= '';

			// Add line item
		   	$item_id = woocommerce_add_order_item( $post_id, array(
		 		'order_item_name' 		=> $order_item['name'],
		 		'order_item_type' 		=> 'line_item'
		 	) );

		 	// Add line item meta
		 	if ( $item_id ) {
			 	woocommerce_add_order_item_meta( $item_id, '_qty', $order_item['qty'] );
			 	woocommerce_add_order_item_meta( $item_id, '_tax_class', $order_item['tax_class'] );
			 	woocommerce_add_order_item_meta( $item_id, '_product_id', $order_item['product_id'] );
			 	woocommerce_add_order_item_meta( $item_id, '_variation_id', $order_item['variation_id'] );
			 	woocommerce_add_order_item_meta( $item_id, '_line_subtotal', $order_item['line_subtotal'] );
			 	woocommerce_add_order_item_meta( $item_id, '_line_subtotal_tax', $order_item['line_subtotal_tax'] );
			 	woocommerce_add_order_item_meta( $item_id, '_line_total', $order_item['line_total'] );
			 	woocommerce_add_order_item_meta( $item_id, '_line_tax', $order_item['line_tax'] );
		 	}

		 } else {
		 	// WC 1.x
	
			// TODO: get meta values if item has variations
			$item_meta = array();
						
			// Add to array	 	
			$order_item = array(
				'id' 				=> stripslashes( $product_id ),
				'variation_id' 		=> (int) $variation_id,
				'name' 				=> htmlspecialchars(stripslashes( $item_name )),
				'qty' 				=> (int) $item_quantity,
				'line_total' 		=> rtrim(rtrim(number_format( $line_total, 4, '.', ''), '0'), '.'),
				'line_tax'			=> rtrim(rtrim(number_format( $line_tax, 4, '.', ''), '0'), '.'),
				'line_subtotal'		=> rtrim(rtrim(number_format( $line_subtotal, 4, '.', ''), '0'), '.'),
				'line_subtotal_tax' => rtrim(rtrim(number_format( $line_subtotal_tax, 4, '.', ''), '0'), '.'),
				'item_meta'			=> $item_meta,
				'tax_class'			=> $item_tax_class
			);
			$order_items = array( $order_item );
		
			update_post_meta( $post_id, '_order_items', $order_items );
		 	
		 }



		// order status
		// wp_set_object_terms( $post_id, 'completed', 'shop_order_status');
		
		// Order data saved, now get it so we can manipulate status
		$order = new WC_Order( $post_id );
		
		// Order status
		if ( $item['CompleteStatus'] == 'Complete') {
			$new_order_status = get_option( 'wplister_new_order_status', 'completed' );
			$order->update_status( $new_order_status );
		} else {
			$order->update_status( 'pending' );
		}

		// allow other developers to post-process orders created by WP-Lister
		do_action( 'wplister_after_create_order', $post_id );

		return $post_id;

	} // createOrderFromTransaction()

	
	// handle local purchases
	static function listen_to_checkout_event() {
		// add_action('woocommerce_checkout_order_processed', array( 'OrderWrapper', 'handle_checkout'), 5, 2 );
		add_action('woocommerce_reduce_order_stock', array( 'OrderWrapper', 'handle_reduce_order_stock'), 5, 1 );
	
		// add ebay meta box to order details page
		// $orders_meta = new WpLister_Order_MetaBox();
	}	

	static function handle_reduce_order_stock( $order ) {
		global $woocommerce;
		global $wpl_logger;
		global $oWPL_WPLister;

		$listingsModel = new ListingsModel();
		// $cart = $woocommerce->cart->get_cart();

		$wpl_logger->info('handle order #'.$order->id );
		// $wpl_logger->info('posted: '.print_r($posted,1) );
		// $wpl_logger->info('cart: '.print_r($cart,1) );

		// Reduce stock levels and do any other actions with products in the cart
		$cart_item_ids = array();
		foreach ( $order->get_items() as $item ) {

			if ( (@$item['id']>0) || (@$item['product_id']>0) ) {

				// get post ID for WC2.0 and WC1.x
				$post_id = isset( $item['product_id'] ) ? $item['product_id'] : $item['id'];
				$wpl_logger->info('processing reduce stock for product #' . $post_id . '');

				$_product = $order->get_product_from_item( $item );
				if ( $_product && $_product->exists() && $_product->managing_stock() ) {

					// update listing quantity - except for variations
					if ( ! ProductWrapper::hasVariations( $post_id ) ) {
						$listingsModel->setListingQuantity( $post_id, $_product->stock );
						// $wpl_logger->info('new stock: ' . $_product->stock . '');
					}

					$wpl_logger->info('adding purchased item to revision queue #' . $post_id . '');
					$cart_item_ids[] = $post_id;

				}

			}

		} // foreach cart item


		// filter items which need to be revised
		$items_to_revise = $listingsModel->filterPurchasedItemsForRevision( $cart_item_ids );

		// revise items
		if ( count($items_to_revise) > 0 ) {
			$order->add_order_note( sprintf( __('Preparing to revise %s item(s) on eBay...', 'wplister'), count($items_to_revise) ) );
			$wpl_logger->info('items_to_revise:' . join( ',', $items_to_revise ) );
			$oWPL_WPLister->initEC();
			$results = $oWPL_WPLister->EC->reviseItems( $items_to_revise );
			$oWPL_WPLister->EC->closeEbay();
			$wpl_logger->info('results: '.print_r($results,1) );
			$order->add_order_note( sprintf( __('%s item(s) were revised on eBay.', 'wplister'), count($items_to_revise) ) );
		}

	} // handle_checkout()
	


	static function handle_checkout_v1( $order_id, $posted ) {
		global $woocommerce;
		global $wpl_logger;
		global $oWPL_WPLister;

		$cart = $woocommerce->cart->get_cart();

		$wpl_logger->info('handle order #'.$order_id );
		// $wpl_logger->info('posted: '.print_r($posted,1) );
		// $wpl_logger->info('cart: '.print_r($cart,1) );

		$cart_item_ids = array();
		foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {

		 	$post_id = $values['product_id'];
		 	$manage_stock = $values['data']->manage_stock;

		 	if ( $manage_stock == 'yes' ) {
				$wpl_logger->info('adding purchased item to queue #' . $post_id . '');
				$cart_item_ids[] = $post_id;
		 	} else {
				$wpl_logger->info('skipping purchased item #' . $post_id . ' - manage_stock is disabled');
		 	}

		} // foreach cart item

		// filter item which need to be revised
		$listingsModel = new ListingsModel();
		$items_to_revise = $listingsModel->filterPurchasedItemsForRevision( $cart_item_ids );

		// revise items
		if ( count($items_to_revise) > 0 ) {
			$wpl_logger->info('items_to_revise:' . print_r($items_to_revise,1) . '');
			$oWPL_WPLister->initEC();
			$results = $oWPL_WPLister->EC->reviseItems( $items_to_revise );
			$oWPL_WPLister->EC->closeEbay();
			$wpl_logger->info('results: '.print_r($results,1) );
		}

	} // handle_checkout()
	
} // class OrderWrapper







/**
 * Columns for Orders page
 **/
add_filter('manage_edit-shop_order_columns', 'wpl_woocommerce_edit_shop_order_columns', 11 );

function wpl_woocommerce_edit_shop_order_columns($columns){
	
	$columns['ebay'] = '<img src="'.WPLISTER_URL.'/img/hammer-dark-16x16.png" title="'.__('Listing status', 'wplister').'" />';		
	return $columns;
}


/**
 * Custom Columns for Orders page
 **/
add_action('manage_shop_order_posts_custom_column', 'wplister_woocommerce_custom_shop_order_columns', 3 );

function wplister_woocommerce_custom_shop_order_columns( $column ) {
	global $post, $woocommerce;
	// $product = new WC_Product($post->ID);

	if ( $column != 'ebay' ) return;

	$ebay_transaction_id = get_post_meta( $post->ID, '_ebay_transaction_id', true );
	// echo $ebay_transaction_id;

	if ( intval($ebay_transaction_id) != 0 ) {

		$ebay_item_id = get_post_meta( $post->ID, '_ebay_item_id', true );
		$listingsModel = new ListingsModel();
		$listing = $listingsModel->getItemByEbayID( $ebay_item_id, false );
		$ebayUrl = $listing->ViewItemURL;
		echo '<a href="'.$ebayUrl.'" title="Transaction #'.$ebay_transaction_id.'" target="_blank"><img src="'.WPLISTER_URL.'/img/ebay-16x16.png" alt="yes" /></a>';		
	}

}

