<?php
/**
 * wrapper functions to access orders
 * This version is actually a dummy class which will be used to prevent errors if no shop plugin was found
 */

class OrderWrapper {
	
	const plugin = 'none';
	const post_type = 'order_post_type';
	
	// get custom post type
	static function getPostType() {
		return self::post_type;
	}	
	
	// create order from transaction
	static function createOrderFromTransaction( $id ) {
		return false;
	} // createOrderFromTransaction()

	// update order from transaction
	static function updateOrderFromTransaction( $id ) {
	}		
	
	static function listen_to_checkout_event() {
	}	

}
