<?php
/**
 * hooks to alter the WooCommerce backend
 */

class WPL_WooBackendIntegration {

	function __construct() {

		// custom column for products table
		add_filter( 'manage_edit-product_columns', array( &$this, 'wpl_woocommerce_edit_product_columns' ), 11 );
		add_action( 'manage_product_posts_custom_column', array( &$this, 'wplister_woocommerce_custom_product_columns' ), 3 );

		// hook into save_post to mark listing as changed when a product is updated
		add_action( 'save_post', array( &$this, 'wplister_on_woocommerce_product_quick_edit_save' ), 10, 2 );

		// custom views for products table
		add_filter( 'parse_query', array( &$this, 'wplister_woocommerce_admin_product_filter_query' ) );
		add_filter( 'views_edit-product', array( &$this, 'wplister_add_woocommerce_product_views' ) );

		add_action( 'post_submitbox_misc_actions', array( &$this, 'wplister_product_submitbox_misc_actions' ), 100 );
		add_action( 'woocommerce_process_product_meta', array( &$this, 'wplister_product_handle_submitbox_actions' ), 100, 2 );

	}



	/**
	 * Columns for Products page
	 **/
	// add_filter('manage_edit-product_columns', 'wpl_woocommerce_edit_product_columns', 11 );

	function wpl_woocommerce_edit_product_columns($columns){
		
		$columns['listed'] = '<img src="'.WPLISTER_URL.'/img/hammer-dark-16x16.png" title="'.__('Listing status', 'wplister').'" />';		
		return $columns;
	}


	/**
	 * Custom Columns for Products page
	 **/
	// add_action('manage_product_posts_custom_column', 'wplister_woocommerce_custom_product_columns', 3 );

	function wplister_woocommerce_custom_product_columns( $column ) {
		global $post, $woocommerce;
		// $product = self::getProduct($post->ID);

		switch ($column) {
			case "listed" :
				$listingsModel = new ListingsModel();
				$status = $listingsModel->getStatusFromPostID( $post->ID );
				if ( ! $status ) break;

				switch ($status) {
					case 'published':
					case 'changed':
						$ebayUrl = $listingsModel->getViewItemURLFromPostID( $post->ID );
						echo '<a href="'.$ebayUrl.'" title="View on eBay" target="_blank"><img src="'.WPLISTER_URL.'/img/ebay-16x16.png" alt="yes" /></a>';
						break;
					
					case 'prepared':
						echo '<img src="'.WPLISTER_URL.'/img/hammer-orange-16x16.png" title="prepared" />';
						break;
					
					case 'verified':
						echo '<img src="'.WPLISTER_URL.'/img/hammer-green-16x16.png" title="verified" />';
						break;
					
					case 'ended':
						echo '<img src="'.WPLISTER_URL.'/img/hammer-16x16.png" title="ended" />';
						break;
					
					default:
						echo '<img src="'.WPLISTER_URL.'/img/hammer-16x16.png" alt="yes" />';
						break;
				}

			break;

		} // switch ($column)

	}


	// hook into save_post to mark listing as changed when a product is updated
	function wplister_on_woocommerce_product_quick_edit_save( $post_id, $post ) {

		if ( !$_POST ) return $post_id;
		if ( is_int( wp_is_post_revision( $post_id ) ) ) return;
		if( is_int( wp_is_post_autosave( $post_id ) ) ) return;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
		// if ( !isset($_POST['woocommerce_quick_edit_nonce']) || (isset($_POST['woocommerce_quick_edit_nonce']) && !wp_verify_nonce( $_POST['woocommerce_quick_edit_nonce'], 'woocommerce_quick_edit_nonce' ))) return $post_id;
		if ( !current_user_can( 'edit_post', $post_id )) return $post_id;
		if ( $post->post_type != 'product' ) return $post_id;

		// global $woocommerce, $wpdb;
		// $product = self::getProduct( $post_id );

		// don't mark as changed when revising anyway
		if ( isset( $_POST['wpl_ebay_revise_on_update'] ) ) return;

		$lm = new ListingsModel();
		$lm->markItemAsModified( $post_id );

		// Clear transient
		// $woocommerce->clear_product_transients( $post_id );
	}
	// add_action( 'save_post', 'wplister_on_woocommerce_product_quick_edit_save', 10, 2 );




	/*
	add_action( 'pre_get_posts', 'wplister_pre_get_posts' ); //hook into the query before it is executed

	function wplister_pre_get_posts( $query )
	{
	    global $custom_where_string;
		$custom_where_string = ''; //used to save the generated where string between filter functions

	    //if the custom parameter is used
	    // if(isset($query->query_vars['_spec'])){
	    if(isset( $_GET['is_on_ebay'] )){

	        //here you can parse the contents of $query->query_vars['_spec'] to modify the query
	        //even the first WHERE starts with AND, because WP adds a "WHERE 1=1" in front of every WHERE section
	        $custom_where_string = 'AND ...';

	        //only if the custom parameter is used, hook into the generation of the query
	        // add_filter('posts_where', 'wplister_posts_where');
	    }
	}

	function wplister_posts_where( $where )
	{
	    global $custom_where_string;

	    echo "<pre>";print_r($where);echo"</pre>";die();

	    //append our custom where expression(s)
	    $where .= $custom_where_string;

	    //clean up to avoid unexpected things on other queries
	    remove_filter('posts_where', 'wplister_posts_where');
	    $custom_where_string = '';

	    return $where;
	}
	*/

	// filter the products in admin based on ebay status
	// add_filter( 'parse_query', 'wplister_woocommerce_admin_product_filter_query' );
	function wplister_woocommerce_admin_product_filter_query( $query ) {
		global $typenow, $wp_query, $wpdb;

	    if ( $typenow == 'product' ) {

	    	// filter by ebay status
	    	if ( ! empty( $_GET['is_on_ebay'] ) ) {

	        	// find all products that are already on ebay
	        	$sql = "
	        			SELECT {$wpdb->prefix}posts.ID 
	        			FROM {$wpdb->prefix}posts 
					    LEFT JOIN {$wpdb->prefix}ebay_auctions
					         ON ( {$wpdb->prefix}posts.ID = {$wpdb->prefix}ebay_auctions.post_id )
					    WHERE {$wpdb->prefix}ebay_auctions.ebay_id != ''
	        	";
	        	$post_ids_on_ebay = $wpdb->get_col( $sql );
	        	// echo "<pre>";print_r($post_ids_on_ebay);echo"</pre>";#die();

	        	// find all products that hidden from ebay
	        	$sql = "
	        			SELECT post_id 
	        			FROM {$wpdb->prefix}postmeta 
					    WHERE meta_key   = '_ebay_hide_from_unlisted'
					      AND meta_value = 'yes'
	        	";
	        	$post_ids_hidden_from_ebay = $wpdb->get_col( $sql );
	        	// echo "<pre>";print_r($post_ids_hidden_from_ebay);echo"</pre>";#die();


		    	if ( $_GET['is_on_ebay'] == 'yes' ) {

					// combine arrays
					$post_ids = array_diff( $post_ids_on_ebay, $post_ids_hidden_from_ebay );
		        	// echo "<pre>";print_r($post_ids);echo"</pre>";die();

		        	if ( is_array($post_ids) && ( sizeof($post_ids) > 0 ) ) {
			        	$query->query_vars['post__in'] = $post_ids;
		        	}

		        } elseif ( $_GET['is_on_ebay'] == 'no' ) {

					// combine arrays
					$post_ids = array_merge( $post_ids_on_ebay, $post_ids_hidden_from_ebay );
		        	// echo "<pre>";print_r($post_ids);echo"</pre>";die();

		        	if ( is_array($post_ids) && ( sizeof($post_ids) > 0 ) ) {
			        	$query->query_vars['post__not_in'] = $post_ids;
		        	}

		        	// $query->query_vars['meta_value'] 	= null;
		        	// $query->query_vars['meta_key'] 		= '_ebay_item_id';

		        	// $query->query_vars['meta_query'] = array(
					// 	'relation' => 'OR',
					// 	array(
					// 		'key' => '_ebay_item_id',
					// 		'value' => ''
					// 	),
					// 	array(
					// 		'key' => '_ebay_item_id',
					// 		'value' => '',
					// 		'compare' => 'NOT EXISTS'
					// 	)
					// );

		        }
	        }

		}

	}

	// # debug final query
	// add_filter( 'posts_results', 'wplister_woocommerce_admin_product_filter_posts_results' );
	// function wplister_woocommerce_admin_product_filter_posts_results( $posts ) {
	// 	global $wp_query;
	// 	echo "<pre>";print_r($wp_query->request);echo"</pre>";#die();
	// 	return $posts;
	// }

	// add custom view to woocommerce products table
	// add_filter( 'views_edit-product', 'wplister_add_woocommerce_product_views' );
	function wplister_add_woocommerce_product_views( $views ) {
		global $wp_query;

		if ( ! current_user_can('edit_others_pages') ) return $views;

		// On eBay
		// $class = ( isset( $wp_query->query['is_on_ebay'] ) && $wp_query->query['is_on_ebay'] == 'no' ) ? 'current' : '';
		$class = ( isset( $_REQUEST['is_on_ebay'] ) && $_REQUEST['is_on_ebay'] == 'yes' ) ? 'current' : '';
		$query_string = remove_query_arg(array( 'is_on_ebay' ));
		$query_string = add_query_arg( 'is_on_ebay', urlencode('yes'), $query_string );
		$views['listed'] = '<a href="'. $query_string . '" class="' . $class . '">' . __('On eBay', 'wplister') . '</a>';

		// Not on eBay
		$class = ( isset( $_REQUEST['is_on_ebay'] ) && $_REQUEST['is_on_ebay'] == 'no' ) ? 'current' : '';
		$query_string = remove_query_arg(array( 'is_on_ebay' ));
		$query_string = add_query_arg( 'is_on_ebay', urlencode('no'), $query_string );
		$views['unlisted'] = '<a href="'. $query_string . '" class="' . $class . '">' . __('Not on eBay', 'wplister') . '</a>';

		// debug query
		// $views['unlisted'] .= "<br>".$wp_query->request."<br>";

		return $views;
	}




	/**
	 * Output product update options.
	 *
	 * @access public
	 * @return void
	 */
	// add_action( 'post_submitbox_misc_actions', 'wplister_product_submitbox_misc_actions', 100 );
	function wplister_product_submitbox_misc_actions() {
		global $post;
		global $woocommerce;

		if ( $post->post_type != 'product' )
			return;

		// check listing status
		$listingsModel = new ListingsModel();
		$status = $listingsModel->getStatusFromPostID( $post->ID );
		if ( ! in_array($status, array('published','changed') ) ) return;

		// get first item
		$listings = $listingsModel->getAllListingsFromPostID( $post->ID );
		if ( sizeof($listings) == 0 ) return;
		$item = $listings[0];

		?>
		
		<style type="text/css">
			#wpl_ebay_revise_on_update {
				width: auto;
				/*margin-left: 1em;*/
				float: right;
			}
			.wpl_ebay_revise_on_update_field { margin:0; }
		</style>

		<div class="misc-pub-section" id="wplister-submit-options">

			<input type="hidden" name="wpl_ebay_listing_id" value="<?php echo $item->id ?>" />

			<?php _e( 'eBay listing is', 'wplister' ); ?>
				<b><?php echo $item->status; ?></b> &nbsp;
				<a href="<?php echo $item->ViewItemURL ?>" target="_blank" style="float:right;">
					<?php echo __('View on eBay', 'wplister') ?>
				</a>
			<br>

			<?php

				$tip = __('Revise eBay listing when updating product', 'wplister') . '. '; 
				$tip .= __('If the product is out of stock, the listing will be ended on eBay.', 'wplister');
				$tip = '<img class="help_tip" data-tip="' . esc_attr( $tip ) . '" src="' . $woocommerce->plugin_url() . '/assets/images/help.png" height="16" width="16" />';

				woocommerce_wp_checkbox( array( 
					'id'    => 'wpl_ebay_revise_on_update', 
					'label' => __('Revise listing on update', 'wplister') . $tip,
					// 'description' => __('Revise on eBay', 'wplister'),
					'value' => get_option( 'wplister_revise_on_update_default', false )
				) );

			?>

		</div>
		<?php
	}


	// handle submitbox options
	// add_action( 'woocommerce_process_product_meta', 'wplister_product_handle_submitbox_actions', 100, 2 );
	function wplister_product_handle_submitbox_actions( $post_id, $post ) {
		global $oWPL_WPLister;
		global $wpl_logger;

		if ( isset( $_POST['wpl_ebay_revise_on_update'] ) ) {

			$wpl_logger->info('revising listing '.$_POST['wpl_ebay_listing_id'] );

			// call EbayController
			$oWPL_WPLister->initEC();
			$results = $oWPL_WPLister->EC->reviseItems( $_POST['wpl_ebay_listing_id'] );
			$oWPL_WPLister->EC->closeEbay();

			$wpl_logger->info('revised listing '.$_POST['wpl_ebay_listing_id'] );

			// $message = __('Selected items were revised on eBay.', 'wplister');
			// $message .= ' ID: '.$_POST['wpl_ebay_listing_id'];
			// $class = (false) ? 'error' : 'updated fade';
			// echo '<div id="message" class="'.$class.'" style="display:block !important"><p>'.$message.'</p></div>';


		}

	} // save_meta_box()


} // class WPL_WooBackendIntegration
$WPL_WooBackendIntegration = new WPL_WooBackendIntegration();
















class WpLister_Product_MetaBox {

	function __construct() {

		add_action( 'add_meta_boxes', array( &$this, 'add_meta_box' ) );
		add_action( 'woocommerce_process_product_meta', array( &$this, 'save_meta_box' ), 0, 2 );

	}

	function add_meta_box() {

		$title = __('eBay options', 'wplister');
		add_meta_box( 'wplister-ebay-details', $title, array( &$this, 'meta_box_basic' ), 'product', 'normal', 'default');

		## BEGIN PRO ##
		$title = __('Advanced eBay options', 'wplister');
		add_meta_box( 'wplister-ebay-advanced', $title, array( &$this, 'meta_box_advanced' ), 'product', 'normal', 'default');
		## END PRO ##		
	}

	function meta_box_basic() {
		global $woocommerce, $post;

        ?>
        <style type="text/css">
            #wplister-ebay-details label { 
            	float: left;
            	width:25%;
            	line-height: 2em;
            }
            #wplister-ebay-details input { 
            	width:74%; 
            }
            #wplister-ebay-details .description { 
            	clear: both;
            	margin-left: 25%;
            }
        </style>
        <?php

		woocommerce_wp_text_input( array(
			'id' 			=> 'wpl_ebay_title',
			'label' 		=> __('Listing title', 'wplister'),
			'placeholder' 	=> 'Custom listing title',
			'description' 	=> '',
			'value'			=> get_post_meta( $post->ID, '_ebay_title', true )
		) );

		woocommerce_wp_text_input( array(
			'id' 			=> 'wpl_ebay_subtitle',
			'label' 		=> __('Listing subtitle', 'wplister'),
			'placeholder' 	=> 'Custom listing subtitle',
			'description' 	=> __('Leave empty to use the product excerpt. Will be cut after 55 characters.','wplister'),
			'value'			=> get_post_meta( $post->ID, '_ebay_subtitle', true )
		) );

		woocommerce_wp_text_input( array(
			'id' 			=> 'wpl_ebay_condition_description',
			'label' 		=> __('Condition description', 'wplister'),
			'placeholder' 	=> 'Condition description',
			'description' 	=> __('This field should only be used to further clarify the condition of used items.','wplister'),
			'value'			=> get_post_meta( $post->ID, '_ebay_condition_description', true )
		) );

		woocommerce_wp_text_input( array(
			'id' 			=> 'wpl_ebay_start_price',
			'label' 		=> __('Price / Start Price', 'wplister'),
			'placeholder' 	=> 'Start Price',
			'value'			=> get_post_meta( $post->ID, '_ebay_start_price', true )
		) );

		woocommerce_wp_select( array(
			'id' 			=> 'wpl_ebay_auction_type',
			'label' 		=> __('Listing Type', 'wplister'),
			'options' 		=> array( 
					''               => __('-- use profile setting --', 'wplister'),
					'Chinese'        => __('Auction', 'wplister'),
					'FixedPriceItem' => __('Fixed Price', 'wplister')
				),
			'value'			=> get_post_meta( $post->ID, '_ebay_auction_type', true )
		) );

	}

	function meta_box_advanced() {
		global $woocommerce, $post;

        ?>
        <style type="text/css">
            #wplister-ebay-advanced label { 
            	float: left;
            	width:25%;
            	line-height: 2em;
            }
            #wplister-ebay-advanced input { 
            	width:74%; 
            }
            #wplister-ebay-advanced .description { 
            	clear: both;
            	margin-left: 25%;
            }
        </style>
        <?php

		## BEGIN PRO ##
	
		woocommerce_wp_text_input( array(
			'id' 			=> 'wpl_ebay_buynow_price',
			'label' 		=> __('Buy Now Price', 'wplister'),
			'placeholder' 	=> 'Buy Now Price',
			'value'			=> get_post_meta( $post->ID, '_ebay_buynow_price', true )
		) );

		woocommerce_wp_text_input( array(
			'id' 			=> 'wpl_ebay_reserve_price',
			'label' 		=> __('Reserve Price', 'wplister'),
			'placeholder' 	=> 'Reserve Price',
			'description' 	=> __('The lowest price at which you are willing to sell the item. Not all categories support a reserve price.','wplister'),
			'value'			=> get_post_meta( $post->ID, '_ebay_reserve_price', true )
		) );

		woocommerce_wp_text_input( array(
			'id' 			=> 'wpl_ebay_upc',
			'label' 		=> __('UPC', 'wplister'),
			'placeholder' 	=> 'Enter a Universal Product Code (UPC) to use product details from the eBay catalog.',
			'value'			=> get_post_meta( $post->ID, '_ebay_upc', true )
		) );

		woocommerce_wp_checkbox( array( 
			'id'    => 'wpl_ebay_global_shipping', 
			'label' => __('Global Shipping', 'wplister'),
			'value' => get_post_meta( $post->ID, '_ebay_global_shipping', true )
		) );

		woocommerce_wp_checkbox( array( 
			'id'    => 'wpl_ebay_hide_from_unlisted', 
			'label' => __('Hide from eBay', 'wplister'),
			'value' => get_post_meta( $post->ID, '_ebay_hide_from_unlisted', true )
		) );

		woocommerce_wp_textarea_input( array( 
			'id'    => 'wpl_ebay_payment_instructions', 
			'label' => __('Payment Instructions', 'wplister'),
			'value' => get_post_meta( $post->ID, '_ebay_payment_instructions', true )
		) );

		## END PRO ##

		// woocommerce_wp_select( array(
		// 	'id' 			=> 'wpl_ebay_condition_id',
		// 	'label' 		=> __('Listing Type', 'wplister'),
		// 	'options' 		=> array( 
		// 			''               => __('-- use profile setting --', 'wplister'),
		// 			'Chinese'        => __('Auction', 'wplister'),
		// 			'FixedPriceItem' => __('Fixed Price', 'wplister')
		// 		),
		// 	'value'			=> get_post_meta( $post->ID, '_ebay_condition_id', true )
		// ) );

		/*
		?>

			<label for="wpl-text-condition_id" class="text_label"><?php echo __('Condition','wplister'); ?>: *</label>
			<select id="wpl-text-condition_id" name="wpl_e2e_condition_id" title="Condition" class=" required-entry select">
			<?php if ( isset( $wpl_available_conditions ) && is_array( $wpl_available_conditions ) ): ?>
				<?php foreach ($wpl_available_conditions as $condition_id => $desc) : ?>
					<option value="" selected="selected"><?php echo __('none','wplister'); ?></option>
					<option value="<?php echo $condition_id ?>" 
						<?php if ( $item_details['condition_id'] == $condition_id ) : ?>
							selected="selected"
						<?php endif; ?>
						><?php echo $desc ?></option>
				<?php endforeach; ?>
			<?php else: ?>
				<option value="" selected="selected"><?php echo __('-- use profile setting --','wplister'); ?></option>
				<option value="1000" selected="selected"><?php echo __('New','wplister'); ?></option>
			<?php endif; ?>
			</select>
			<br class="clear" />

		<?php
		*/

		// woocommerce_wp_checkbox( array( 'id' => 'wpl_update_ebay_on_save', 'wrapper_class' => 'update_ebay', 'label' => __('Update on save?', 'wplister') ) );
	
	}

	function save_meta_box( $post_id, $post ) {

		if ( isset( $_POST['wpl_ebay_title'] ) ) {

			// get field values
			$wpl_ebay_title                 = esc_attr( @$_POST['wpl_ebay_title'] );
			$wpl_ebay_subtitle              = esc_attr( @$_POST['wpl_ebay_subtitle'] );
			$wpl_ebay_global_shipping       = esc_attr( @$_POST['wpl_ebay_global_shipping'] );
			$wpl_ebay_payment_instructions  = esc_attr( @$_POST['wpl_ebay_payment_instructions'] );
			$wpl_ebay_condition_description = esc_attr( @$_POST['wpl_ebay_condition_description'] );
			$wpl_ebay_auction_type          = esc_attr( @$_POST['wpl_ebay_auction_type'] );
			$wpl_ebay_start_price           = esc_attr( @$_POST['wpl_ebay_start_price'] );
			$wpl_ebay_reserve_price         = esc_attr( @$_POST['wpl_ebay_reserve_price'] );
			$wpl_ebay_buynow_price          = esc_attr( @$_POST['wpl_ebay_buynow_price'] );
			$wpl_ebay_upc          			= esc_attr( @$_POST['wpl_ebay_upc'] );
			$wpl_ebay_hide_from_unlisted  	= esc_attr( @$_POST['wpl_ebay_hide_from_unlisted'] );

			// Update order data
			update_post_meta( $post_id, '_ebay_title', $wpl_ebay_title );
			update_post_meta( $post_id, '_ebay_subtitle', $wpl_ebay_subtitle );
			update_post_meta( $post_id, '_ebay_global_shipping', $wpl_ebay_global_shipping );
			update_post_meta( $post_id, '_ebay_payment_instructions', $wpl_ebay_payment_instructions );
			update_post_meta( $post_id, '_ebay_condition_description', $wpl_ebay_condition_description );
			update_post_meta( $post_id, '_ebay_auction_type', $wpl_ebay_auction_type );
			update_post_meta( $post_id, '_ebay_start_price', $wpl_ebay_start_price );
			update_post_meta( $post_id, '_ebay_reserve_price', $wpl_ebay_reserve_price );
			update_post_meta( $post_id, '_ebay_buynow_price', $wpl_ebay_buynow_price );
			update_post_meta( $post_id, '_ebay_upc', $wpl_ebay_upc );
			update_post_meta( $post_id, '_ebay_hide_from_unlisted', $wpl_ebay_hide_from_unlisted );

		}

	} // save_meta_box()

} // class WpLister_Product_MetaBox
$WpLister_Product_MetaBox = new WpLister_Product_MetaBox();














## BEGIN PRO ##

class WpLister_Order_MetaBox {

	var $providers;

	/**
	 * Constructor
	 */
	function __construct() {

		$this->providers = array(
			'Australia Post' => 'Australia Post',
			'Canada Post' => 'Canada Post',
			'Chronopost' => 'Chronopost',
			'City Link' => 'City Link',
			'ColiposteDomestic' => 'Coliposte Domestic',
			'ColiposteInternational' => 'Coliposte International',
			'Correos' => 'Correos',
			'DHL' => 'DHL',
			'DPD' => 'DPD',
			'DTDC' => 'DTDC',
			'FedEx' => 'Fedex',
			'Hermes' => 'Hermes',
			'iLoxx' => 'iLoxx',
			'Nacex' => 'Nacex',
			'OnTrac' => 'OnTrac',
			'ParcelForce' => 'ParcelForce',
			'PostNL' => 'PostNL',
			'Posten AB' => 'Posten AB',
			'Royal Mail' => 'Royal Mail',
			'SAPO' => 'SAPO',
			'TNT' => 'TNT',
			'UPS' => 'UPS',
			'USPS' => 'U.S. Postal Service',
			'Other' => 'Other postal service'
		);

		// add_action( 'admin_print_styles', array( &$this, 'admin_styles' ) );
		add_action( 'add_meta_boxes', array( &$this, 'add_meta_box' ) );
		// add_action( 'woocommerce_process_shop_order_meta', array( &$this, 'save_meta_box' ), 0, 2 );
        add_action( 'wp_ajax_wpl_update_ebay_feedback', array( &$this, 'update_ebay_feedback' ) ); 

	}

	// function admin_styles() {
	// 	wp_enqueue_style( 'shipment_tracking_styles', plugins_url( basename( dirname( __FILE__ ) ) ) . '/assets/css/admin.css' );
	// }

	/**
	 * Add the meta box for shipment info on the order page
	 *
	 * @access public
	 */
	function add_meta_box() {

		// skip if this is not an order created by WP-Lister
		$ebay_transaction_id = '';
		if ( isset( $_GET['post'] ) ) $ebay_transaction_id = get_post_meta( $_GET['post'], '_ebay_transaction_id', true );
		if ( intval($ebay_transaction_id) == 0 ) return;

		$title = __('eBay', 'wplister') . ' <small style="color:#999"> &ndash; Transaction ID ' . $ebay_transaction_id . '</small>';
		add_meta_box( 'woocommerce-ebay-details', $title, array( &$this, 'meta_box' ), 'shop_order', 'side', 'core');
	}

	/**
	 * Show the meta box for shipment info on the order page
	 *
	 * @access public
	 */
	function meta_box() {
		global $woocommerce, $post;

		// $ebay_transaction_id = get_post_meta( $post->ID, '_ebay_transaction_id', true );
		// echo '<p>Transaction ID: '.$ebay_transaction_id.'</p>';
		
		$selected_provider = get_post_meta( $post->ID, '_tracking_provider', true );

		echo '<p class="form-field wpl_tracking_provider_field"><label for="wpl_tracking_provider">' . __('Shipping service', 'wplister') . ':</label><br/><select id="wpl_tracking_provider" name="wpl_tracking_provider" class="chosen_select" style="width:100%;">';

		echo '<option value="">-- ' . __('Select shipping service', 'wplister') . ' --</option>';
		foreach ( $this->providers as $provider => $display_name  ) {
			echo '<option value="' . $provider . '" ' . selected( $provider, $selected_provider, true ) . '>' . $display_name . '</option>';
		}

		echo '</select> ';

		woocommerce_wp_text_input( array(
			'id' 			=> 'wpl_tracking_number',
			'label' 		=> __('Tracking ID:', 'wplister'),
			'placeholder' 	=> '',
			'description' 	=> '',
			'value'			=> get_post_meta( $post->ID, '_tracking_number', true )
		) );

		woocommerce_wp_text_input( array(
			'id' 			=> 'wpl_date_shipped',
			'label' 		=> __('Shipping date:', 'wplister'),
			'placeholder' 	=> '',
			'description' 	=> '',
			'class'			=> 'date-picker-field',
			'value'			=> ( $date = get_post_meta( $post->ID, '_date_shipped', true ) ) ? date( 'Y-m-d', $date ) : ''
		) );

		woocommerce_wp_text_input( array(
			'id' 			=> 'wpl_feedback_text',
			'label' 		=> __('Your feedback:', 'wplister'),
			'placeholder' 	=> '',
			'description' 	=> 'Feedback is always positive.',
			'value'			=> get_post_meta( $post->ID, '_feedback_text', true )
		) );

		// woocommerce_wp_checkbox( array( 'id' => 'wpl_update_ebay_on_save', 'wrapper_class' => 'update_ebay', 'label' => __('Update on save?', 'wplister') ) );


        // $feedback_text = get_post_meta( $post->ID, '_feedback_text', true );
        // if ( $feedback_text ) {
        //     echo '<p>';
        //     echo '<a id="btn_update_again" href="'.$transaction_id.'" target="_blank" class="button-secondary">Update again</a>';
        //     echo '</p>';
        // } else {
            echo '<p>';
            echo '<div id="btn_update_ebay_feedback_spinner" style="float:left;display:none"><img src="'.WP_PLUGIN_URL.'/wp-lister/img/ajax-loader-f9.gif"/></div>';
            echo '<a href="#" id="btn_update_ebay_feedback" class="button button-primary">Update on eBay</a>';
            // echo '<a id="btn_update_again" href="#" style="display:none" target="_blank" class="button-secondary">Update again</a>';
            echo '<div id="ebay_result_info" class="updated" style="display:none"><p></p></div>';
            echo '</p>';
            // echo "<br><br>";
        // }



        $woocommerce->add_inline_js("

            var wpl_updateEbayFeedback = function ( post_id ) {


                var tracking_provider = jQuery('#wpl_tracking_provider').val();
                var tracking_number = jQuery('#wpl_tracking_number').val();
                var date_shipped = jQuery('#wpl_date_shipped').val();
                var feedback_text = jQuery('#wpl_feedback_text').val();
                
                // load task list
                var params = {
                    action: 'wpl_update_ebay_feedback',
                    order_id: post_id,
                    wpl_tracking_provider: tracking_provider,
                    wpl_tracking_number: tracking_number,
                    wpl_date_shipped: date_shipped,
                    wpl_feedback_text: feedback_text,
                    nonce: 'TODO'
                };
                var jqxhr = jQuery.getJSON( ajaxurl, params )
                .success( function( response ) { 

                    jQuery('#btn_update_ebay_feedback_spinner').hide();

                    if ( response.success ) {

                        var transaction_id = response.transaction_id;

                        var logMsg = 'Transaction #'+transaction_id+' was created.';
                        jQuery('#ebay_result_info p').html( logMsg );
                        jQuery('#ebay_result_info').slideDown();
                        jQuery('#btn_update_ebay_feedback').hide('fast');
                        jQuery('#btn_update_again').attr('href',response.invoice_url);
                        jQuery('#btn_update_again').show('fast');

                    } else {

                        var logMsg = '<b>There was a problem updating this order on eBay</b><br><br>'+response.error;
                        jQuery('#ebay_result_info p').html( logMsg );
                        jQuery('#ebay_result_info').addClass( 'error' ).removeClass('updated');
                        jQuery('#ebay_result_info').slideDown();

                        jQuery('#btn_update_ebay_feedback').removeClass('disabled');
                    }


                })
                .error( function(e,xhr,error) { 
                    jQuery('#ebay_result_info p').html( 'The server responded: ' + e.responseText + '<br>' );

                    jQuery('#btn_update_ebay_feedback_spinner').hide();
                    jQuery('#btn_update_ebay_feedback').removeClass('disabled');

                    console.log( 'error', xhr, error ); 
                    console.log( e.responseText ); 
                });

            }

            jQuery('#btn_update_ebay_feedback').click(function(){

                var post_id = jQuery('#post_ID').val();

                jQuery('#btn_update_ebay_feedback_spinner').show();
                jQuery(this).addClass('disabled');
                wpl_updateEbayFeedback( post_id );

                return false;
            });
        ");
	
	}

	/**
	 * Order Downloads Save
	 *
	 * Function for processing and storing all order downloads.
	 */
	function save_meta_box( $post_id, $post ) {
		if ( isset( $_POST['wpl_tracking_number'] ) ) {
		/*
			// get field values
			$wpl_tracking_provider		= esc_attr( $_POST['wpl_tracking_provider'] );
			$wpl_tracking_number 		= esc_attr( $_POST['wpl_tracking_number'] );
			$wpl_date_shipped			= esc_attr( strtotime( $_POST['wpl_date_shipped'] ) );
			$wpl_feedback_text 			= esc_attr( $_POST['wpl_feedback_text'] );

			// Update order data
			update_post_meta( $post_id, '_tracking_provider', $wpl_tracking_provider );
			update_post_meta( $post_id, '_tracking_number', $wpl_tracking_number );
			update_post_meta( $post_id, '_date_shipped', $wpl_date_shipped );
			update_post_meta( $post_id, '_feedback_text', $wpl_feedback_text );

			// build array
			$data = array();
			$data['TrackingNumber']  = $wpl_tracking_number;
			$data['TrackingCarrier'] = $wpl_tracking_provider;
			$data['ShippedTime']     = $wpl_date_shipped;
			$data['FeedbackText']    = $wpl_feedback_text;

			// call CompleteOrder on eBay
			if ( ( $wpl_tracking_number != '' ) && 
				 ( $wpl_date_shipped != '' ) && 
				 ( $wpl_feedback_text != '' ) )  {

				// $message = __('Order details were updated on eBay.','wplister');
				// echo '<div id="message" class="" style="display:block !important;"><p>'.$message.'</p></div>';

				global $oWPL_WPLister;
				$oWPL_WPLister->initEC();
				$oWPL_WPLister->EC->completeOrder( $post_id, $data );
				$oWPL_WPLister->EC->closeEbay();
				// $this->showMessage( __('Order details were updated on eBay.','wplister') );
				
				global $wpl_logger;
				$wpl_logger->info( 'save_meta_box' );
			}

		*/
		}
	}

    /**
     * update feedback and tracking details on ebay (ajax)
     */
    function update_ebay_feedback() {

		// get field values
        $post_id 					= $_REQUEST['order_id'];
		$wpl_tracking_provider		= esc_attr( $_REQUEST['wpl_tracking_provider'] );
		$wpl_tracking_number 		= esc_attr( $_REQUEST['wpl_tracking_number'] );
		$wpl_date_shipped			= esc_attr( strtotime( $_REQUEST['wpl_date_shipped'] ) );
		$wpl_feedback_text 			= esc_attr( $_REQUEST['wpl_feedback_text'] );

		// if tracking number is set, but date is missing, set date today.
		if ( trim($wpl_tracking_number) != '' ) {
			if ( $wpl_date_shipped == '' ) $wpl_date_shipped = date('U');
		}

		// build array
		$data = array();
		$data['TrackingNumber']  = $wpl_tracking_number;
		$data['TrackingCarrier'] = $wpl_tracking_provider;
		$data['ShippedTime']     = $wpl_date_shipped;
		$data['FeedbackText']    = $wpl_feedback_text;

		global $oWPL_WPLister;
		$oWPL_WPLister->initEC();
		$response = $oWPL_WPLister->EC->completeOrder( $post_id, $data );
		$oWPL_WPLister->EC->closeEbay();

		// global $wpl_logger;
		// $wpl_logger->info('RESPONSE: '.print_r( $response, 1 ) );			
		// $this->showMessage( __('Order details were updated on eBay.','wplister') );			

		// Update order data if request was successful
		if ( $response->success ) {
			update_post_meta( $post_id, '_tracking_provider', $wpl_tracking_provider );
			update_post_meta( $post_id, '_tracking_number', $wpl_tracking_number );
			update_post_meta( $post_id, '_date_shipped', $wpl_date_shipped );
			update_post_meta( $post_id, '_feedback_text', $wpl_feedback_text );
		}

        $this->returnJSON( $response );
        exit();

    }

    public function returnJSON( $data ) {
        header('content-type: application/json; charset=utf-8');
        echo json_encode( $data );
    }
    

}
$WpLister_Order_MetaBox = new WpLister_Order_MetaBox();

## END PRO ##


