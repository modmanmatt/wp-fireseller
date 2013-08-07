<?php
/**
 * SettingsPage class
 * 
 */

class SettingsPage extends WPL_Page {

	const slug = 'settings';

	public function onWpInit() {
		// parent::onWpInit();

		// custom (raw) screen options for settings page
		add_screen_options_panel('wplister_setting_options', '', array( &$this, 'renderSettingsOptions'), 'wp-lister_page_wplister-settings' );

		// Add custom screen options
		add_action( "load-wp-lister_page_wplister-".self::slug, array( &$this, 'addScreenOptions' ) );

		// network admin page
		add_action( 'network_admin_menu', array( &$this, 'onWpAdminMenu' ) ); 

	}

	public function onWpAdminMenu() {
		parent::onWpAdminMenu();

		add_submenu_page( self::ParentMenuId, $this->getSubmenuPageTitle( 'Settings' ), __('Settings','wplister'), 
						  'manage_options', $this->getSubmenuId( 'settings' ), array( &$this, 'onDisplaySettingsPage' ) );
	}

	function addScreenOptions() {
		// load styles and scripts for this page only
		add_action( 'admin_print_styles', array( &$this, 'onWpPrintStyles' ) );
		add_action( 'admin_enqueue_scripts', array( &$this, 'onWpEnqueueScripts' ) );		
		$this->categoriesMapTable = new CategoriesMapTable();
		add_thickbox();
	}
	
	public function handleSubmit() {
        $this->logger->debug("handleSubmit()");

		// handle redirect to ebay auth url
		if ( $this->requestAction() == 'wplRedirectToAuthURL') {				

			// get auth url
			$this->initEC();
			$auth_url = $this->EC->getAuthUrl();
			$this->EC->closeEbay();

			$this->logger->info( "wplRedirectToAuthURL() to: ", $auth_url );
			wp_redirect( $auth_url );
		}

		// save settings
		if ( $this->requestAction() == 'save_wplister_settings' ) {
			$this->saveSettings();
		}

		// save category map
		if ( $this->requestAction() == 'save_wplister_categories_map' ) {
			$this->saveCategoriesSettings();
		}

		// import category map
		if ( $this->requestAction() == 'wplister_import_categories_map' ) {
			$this->handleImportCategoriesMap();
		}

		// export category map
		if ( $this->requestAction() == 'wplister_export_categories_map' ) {
			$this->handleExportCategoriesMap();
		}

		## BEGIN PRO ##
		// save license
		if ( $this->requestAction() == 'save_wplister_license' ) {
			$this->saveLicenseSettings();
		}
		## END PRO ##

		// save developer settings
		if ( $this->requestAction() == 'save_wplister_devsettings' ) {
			$this->saveDeveloperSettings();
		}

		// set ebay site
		if ( $this->requestAction() == 'save_ebay_site' ) {
			self::updateOption( 'ebay_site_id',		$this->getValueFromPost( 'text_ebay_site_id' ) );
		}

	}
	

	public function onDisplaySettingsPage() {
		WPL_Setup::checkSetup('settings');

        $default_tab = is_network_admin() ? 'license' : 'settings';
        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : $default_tab;
        if ( 'categories' == $active_tab ) return $this->displayCategoriesPage();
        if ( 'developer' == $active_tab ) return $this->displayDeveloperPage();
		## BEGIN PRO ##
        if ( 'license' == $active_tab ) return $this->displayLicensePage();
		## END PRO ##
	
		// action remove_token
		if ( $this->requestAction() == 'remove_token' ) {
			check_admin_referer('remove_token');

			// remove_token
			self::updateOption('ebay_token','');
			self::updateOption('ebay_token_expirationtime','');
			self::updateOption('ebay_token_userid','');
			self::updateOption('ebay_user','');

			// check if we have a token
			if ( self::getOption('ebay_token') == '' ) {
				$this->showMessage( "Please link WP-Lister to your eBay account." );
			}

			WPL_Setup::checkSetup('settings');
		}

		// action FetchToken
		if ( $this->requestAction() == 'FetchToken' ) {

			// FetchToken
			$this->initEC();
			$ebay_token = $this->EC->doFetchToken();
			$this->EC->closeEbay();

			// check if we have a token
			if ( self::getOption('ebay_token') == '' ) {
				$this->showMessage( "There was a problem fetching your token. Make sure you follow the instructions.", 1 );
			}

			WPL_Setup::checkSetup('settings');
		}


		$aData = array(
			'plugin_url'				=> self::$PLUGIN_URL,
			'message'					=> $this->message,

			'text_ebay_token'			=> self::getOption( 'ebay_token' ),
			'text_ebay_site_id'			=> self::getOption( 'ebay_site_id' ),
			'text_paypal_email'			=> self::getOption( 'paypal_email' ),
			'ebay_sites'				=> EbayController::getEbaySites(),
			'ebay_token_userid'			=> self::getOption( 'ebay_token_userid' ),
			'ebay_user'					=> self::getOption( 'ebay_user' ),

			'option_cron_auctions'		=> self::getOption( 'cron_auctions' ),
			'option_cron_transactions'	=> self::getOption( 'cron_transactions' ),
			'process_shortcodes'		=> self::getOption( 'process_shortcodes', 'content' ),
			'remove_links'				=> self::getOption( 'remove_links', 'default' ),
			'default_image_size'		=> self::getOption( 'default_image_size', 'full' ),
			'wc2_gallery_fallback'		=> self::getOption( 'wc2_gallery_fallback', 'attached' ),
			'hide_dupe_msg'				=> self::getOption( 'hide_dupe_msg' ),
			'option_uninstall'			=> self::getOption( 'uninstall' ),
			'option_enable_ebay_motors'	=> self::getOption( 'enable_ebay_motors' ),
			## BEGIN PRO ##
			'option_handle_stock'         => self::getOption( 'handle_stock' ),
			'option_create_orders'        => self::getOption( 'create_orders' ),
			'option_foreign_transactions' => self::getOption( 'foreign_transactions' ),
			'option_new_order_status'     => self::getOption( 'new_order_status', 'completed' ),
			'local_auction_display'       => self::getOption( 'local_auction_display', 'off' ),
			## END PRO ##
	
			'settings_url'				=> 'admin.php?page='.self::ParentMenuId.'-settings',
			'auth_url'					=> 'admin.php?page='.self::ParentMenuId.'-settings'.'&tab='.$active_tab.'&action=wplRedirectToAuthURL',
			'form_action'				=> 'admin.php?page='.self::ParentMenuId.'-settings'.'&tab='.$active_tab
		);
		$this->display( 'settings_page', $aData );
	}

	public function displayCategoriesPage() {

    	$shop_categories = $this->loadProductCategories();

	    //Create an instance of our package class...
	    $categoriesMapTable = new CategoriesMapTable();
    	//Fetch, prepare, sort, and filter our data...
	    $categoriesMapTable->prepare_items( $shop_categories );

	    $default_category_id = self::getOption('default_ebay_category_id');
	    $default_category_name = EbayCategoriesModel::getFullEbayCategoryName( $default_category_id );
	    if ( ! $default_category_name ) $default_category_name = 'None';

		$aData = array(
			'plugin_url'				=> self::$PLUGIN_URL,
			'message'					=> $this->message,

			'shop_categories'			=> $shop_categories,
			'categoriesMapTable'		=> $categoriesMapTable,
			'default_category_id'		=> $default_category_id,
			'default_category_name'		=> $default_category_name,

			'settings_url'				=> 'admin.php?page='.self::ParentMenuId.'-settings',
			'form_action'				=> 'admin.php?page='.self::ParentMenuId.'-settings'.'&tab=categories'
		);
		$this->display( 'settings_categories', $aData );
	}

	## BEGIN PRO ##
	public function displayLicensePage() {

		$aData = array(
			'plugin_url'				=> self::$PLUGIN_URL,
			'message'					=> $this->message,

			'text_license_key'			=> self::getOption( 'license_key' ),
			'text_license_email'		=> self::getOption( 'license_email' ),
			'license_activated'			=> self::getOption( 'license_activated' ),

			'settings_url'				=> 'admin.php?page='.self::ParentMenuId.'-settings',
			'form_action'				=> 'admin.php?page='.self::ParentMenuId.'-settings'.'&tab=license'
		);
		$this->display( 'settings_license', $aData );
	}
	## END PRO ##

	public function displayDeveloperPage() {

		$aData = array(
			'plugin_url'				=> self::$PLUGIN_URL,
			'message'					=> $this->message,

			'update_channel'			=> self::getOption( 'update_channel', 'stable' ),
			'ajax_error_handling'		=> self::getOption( 'ajax_error_handling', 'halt' ),
			'disable_variations'		=> self::getOption( 'disable_variations', 0 ),
			'log_record_limit'			=> self::getOption( 'log_record_limit', 4096 ),

			'text_ebay_token'			=> self::getOption( 'ebay_token' ),
			'text_log_level'			=> self::getOption( 'log_level' ),

			'option_log_to_db'			=> self::getOption( 'log_to_db' ),
			'option_sandbox_enabled'	=> self::getOption( 'sandbox_enabled' ),

			'settings_url'				=> 'admin.php?page='.self::ParentMenuId.'-settings',
			'form_action'				=> 'admin.php?page='.self::ParentMenuId.'-settings'.'&tab=developer'
		);
		$this->display( 'settings_dev', $aData );
	}


	protected function saveSettings() {

		// TODO: check nonce
		if ( isset( $_POST['wpl_e2e_text_ebay_site_id'] ) ) {

			// reminder to update categories when site id changes
			$old_ebay_site_id = self::getOption( 'ebay_site_id' );
			if ( $old_ebay_site_id != $this->getValueFromPost( 'text_ebay_site_id' ) ) {
				$this->showMessage( __('You switched to a different eBay site. Please make sure that you update eBay details on the Tools page.','wplister') );
				// self::updateOption( 'site_id_changed', '1' );
			}

			self::updateOption( 'ebay_site_id',			$this->getValueFromPost( 'text_ebay_site_id' ) );
			self::updateOption( 'paypal_email',			$this->getValueFromPost( 'text_paypal_email' ) );
			
			self::updateOption( 'cron_auctions',		$this->getValueFromPost( 'option_cron_auctions' ) );
			self::updateOption( 'cron_transactions',	$this->getAnswerFromPost( 'option_cron_transactions' ) );
			self::updateOption( 'process_shortcodes', 	$this->getValueFromPost( 'process_shortcodes' ) );
			self::updateOption( 'remove_links',     	$this->getValueFromPost( 'remove_links' ) );
			self::updateOption( 'default_image_size',   $this->getValueFromPost( 'default_image_size' ) );
			self::updateOption( 'wc2_gallery_fallback', $this->getValueFromPost( 'wc2_gallery_fallback' ) );
			self::updateOption( 'hide_dupe_msg',    	$this->getValueFromPost( 'hide_dupe_msg' ) );
			self::updateOption( 'uninstall',			$this->getValueFromPost( 'option_uninstall' ) );
			self::updateOption( 'enable_ebay_motors', 	$this->getValueFromPost( 'option_enable_ebay_motors' ) );
			## BEGIN PRO ##
			self::updateOption( 'handle_stock',			$this->getValueFromPost( 'option_handle_stock' ) );
			self::updateOption( 'create_orders',		$this->getValueFromPost( 'option_create_orders' ) );
			self::updateOption( 'foreign_transactions',	$this->getValueFromPost( 'option_foreign_transactions' ) );
			self::updateOption( 'new_order_status',		$this->getValueFromPost( 'option_new_order_status' ) );
			self::updateOption( 'local_auction_display',$this->getValueFromPost( 'local_auction_display' ) );
			## END PRO ##

			$this->handleCronSettings( $this->getValueFromPost( 'option_cron_auctions' ) );
			$this->showMessage( __('Settings saved.','wplister') );
		}
	}


	protected function saveCategoriesSettings() {

		// TODO: check nonce
		if ( isset( $_POST['wpl_e2e_ebay_category_id'] ) ) {

			// save ebay categories mapping
			self::updateOption( 'categories_map_ebay',	$this->getValueFromPost( 'ebay_category_id' ) );

			// save store categories mapping
			self::updateOption( 'categories_map_store',	$this->getValueFromPost( 'store_category_id' ) );

			// save default ebay category
			self::updateOption( 'default_ebay_category_id', $this->getValueFromPost( 'default_ebay_category_id' ) );

			$this->showMessage( __('Categories mapping updated.','wplister') );
		}
	}
	
	## BEGIN PRO ##
	protected function saveLicenseSettings() {

		// TODO: check nonce
		if ( isset( $_POST['wpl_e2e_text_license_key'] ) ) {

			$newLicense = $this->getValueFromPost( 'text_license_key' );
			$newEmail   = $this->getValueFromPost( 'text_license_email' );
			if ( trim($newLicense) == '' ) {
				$this->showMessage( __('Please enter your license key.','wplister'), 1 );
				return;
			}
			if ( trim($newEmail) == '' ) {
				$this->showMessage( __('Please enter your license email address.','wplister'), 1 );
				return;
			}

			// new license key or email ?
			$oldLicense = self::getOption( 'license_key' );
			$oldEmail   = self::getOption( 'license_email' );
			if ( $oldLicense != $this->getValueFromPost( 'text_license_key' ) ) {
				self::updateOption( 'license_activated', '0' );
			}
			if ( $oldEmail != $this->getValueFromPost( 'text_license_email' ) ) {
				self::updateOption( 'license_activated', '0' );
			}

			// license activated ?	
			if ( self::getOption( 'license_activated' ) != '1' ) {
				global $WPL_CustomUpdater;
				if ( is_object( $WPL_CustomUpdater ) ) { // skip if no updater included
					$result = $WPL_CustomUpdater->activate_license( $this->getValueFromPost( 'text_license_key' ), $this->getValueFromPost( 'text_license_email' ) );
					if ( $result === true ) {
						$this->showMessage( __('Your license was activated.','wplister') );
						self::updateOption( 'license_activated', '1' );
					} elseif ( is_wp_error( $result ) ) {
						$error_string = $result->get_error_message();
						$this->showMessage( __('There was a problem activating your license.','wplister')
											. '<br>' . $error_string, 1 );
					} elseif ( is_object($result) ) {
						$this->showMessage( __('There was a problem activating your license.','wplister')
											. '<br>Error #'.$result->code.': '. $result->error, 1 );
					} else {
						$this->showMessage( __('There was a problem activating your license.','wplister')
											. '<br>Error #'.$result, 1 );
					}					
				}
			}

			self::updateOption( 'license_key',		$this->getValueFromPost( 'text_license_key' ) );
			self::updateOption( 'license_email',	$this->getValueFromPost( 'text_license_email' ) );
			// $this->showMessage( __('License settings updated.','wplister') );

			if ( $this->getValueFromPost( 'deactivate_license' ) == '1') {

				global $WPL_CustomUpdater;
				$result = $WPL_CustomUpdater->deactivate_license( self::getOption( 'license_key' ), self::getOption( 'license_email' ) );
				#echo "<pre>";print_r($result);echo"</pre>";#die();

				if ( $result === true ) {
					$this->showMessage( __('Your license was deactivated.','wplister') );
					self::updateOption( 'license_activated', '0' );
					self::updateOption( 'license_key', '' );
					self::updateOption( 'license_email', '' );

				} elseif ( is_object($result) && (!is_wp_error($result)) && ( $result->code == 104 ) ) {
					$this->showMessage( __('This license has not been activated on this site.','wplister') );
					$this->showMessage( __('The update server responded:','wplister')
										. '<br>Error #'.$result->code.': '. $result->error, 1 );
					self::updateOption( 'license_activated', '0' );
					self::updateOption( 'license_key', '' );
					self::updateOption( 'license_email', '' );

				} elseif ( is_wp_error( $result ) ) {
					$error_string = $result->get_error_message();
					$this->showMessage( __('There was a problem deactivating your license.','wplister')
										. ' (1)<br>' . $error_string, 1 );
				} elseif ( is_object($result) ) {
					$this->showMessage( __('There was a problem deactivating your license.','wplister')
										. ' (2)<br>Error #'.$result->code.': '. $result->error, 1 );
				} else {
					$this->showMessage( __('There was a problem deactivating your license.','wplister')
										. ' (3)<br>Error: '.$result, 1 );
				}					


			}

		}
	}
	## END PRO ##
	
	protected function saveDeveloperSettings() {

		// TODO: check nonce
		if ( isset( $_POST['wpl_e2e_option_sandbox_enabled'] ) ) {

			// toggle sandbox ?
			$oldToken = self::getOption( 'ebay_token' );
			if ( self::getOption( 'sandbox_enabled' ) != $this->getValueFromPost( 'option_sandbox_enabled' ) ) {
				
				$sandbox_enabled = ($this->getValueFromPost( 'option_sandbox_enabled' ) == '1') ? true : false ;
				$tokens = self::getOption( 'ebay_tokens' );
				if (!$tokens) $tokens = array();
				
				if ( $sandbox_enabled ) {
					
					// backup token
					$tokens['production'] = array();
					$tokens['production']['mode'] = 'production';
					$tokens['production']['token'] = self::getOption( 'ebay_token' );
					self::updateOption( 'ebay_tokens', $tokens );
					
					// restore sandbox token
					if ( isset($tokens['sandbox']) ) {
						self::updateOption( 'ebay_token', $tokens['sandbox']['token'] );
						self::updateOption( 'sandbox_enabled',	$this->getValueFromPost( 'option_sandbox_enabled' ) );
						$this->initEC();
						$UserID = $this->EC->GetUser();
						$this->EC->closeEbay();
						$this->showMessage( __('Enabled sandbox mode.','wplister') . ' ' .
											sprintf( "Your token for %s was restored.", $UserID ) );
					} else {
						$this->showMessage( __('Enabled sandbox mode.','wplister') );
					}

				} else {
					
					// backup token
					$tokens['sandbox'] = array();
					$tokens['sandbox']['mode'] = 'sandbox';
					$tokens['sandbox']['token'] = self::getOption( 'ebay_token' );
					self::updateOption( 'ebay_tokens', $tokens );
					
					// restore production token
					if ( isset($tokens['production']) ) {
						self::updateOption( 'ebay_token', $tokens['production']['token'] );
						self::updateOption( 'sandbox_enabled',	$this->getValueFromPost( 'option_sandbox_enabled' ) );
						$this->initEC();
						$UserID = $this->EC->GetUser();
						$this->EC->closeEbay();
						$this->showMessage( __('Switched to production mode.','wplister') . ' ' .
											sprintf( "Your token for %s was restored.", $UserID ) );
					} else {
						$this->showMessage( __('Switched to production mode.','wplister') );
					}

				}
			}

			self::updateOption( 'log_level',			$this->getValueFromPost( 'text_log_level' ) );
			self::updateOption( 'log_to_db',			$this->getValueFromPost( 'option_log_to_db' ) );
			self::updateOption( 'sandbox_enabled',		$this->getValueFromPost( 'option_sandbox_enabled' ) );
			self::updateOption( 'ajax_error_handling',	$this->getValueFromPost( 'ajax_error_handling' ) );
			self::updateOption( 'disable_variations',	$this->getValueFromPost( 'disable_variations' ) );
			self::updateOption( 'log_record_limit',		$this->getValueFromPost( 'log_record_limit' ) );

			## BEGIN PRO ##
			// handle changed update channel
			$old_channel = self::getOption( 'update_channel' );
			if ( $old_channel != $this->getValueFromPost( 'update_channel' ) ) {
	            set_site_transient('update_plugins', null);
				$this->showMessage( 
					'<big>'. __('Update channel was changed.','wplister') . '</big><br><br>'
					. __('To install the latest version of WP-Lister, please visit your WordPress Updates now.','wplister') . '<br><br>'
					. __('Since the updater runs in the background, it might take a little while before new updates appear.','wplister') . '<br><br>'
					. '&raquo; <a href="update-core.php">'.__('view updates','wplister') . '</a>'
				);		
			}
			self::updateOption( 'update_channel', $this->getValueFromPost( 'update_channel' ) );
			## END PRO ##

			// new manual token ?
			if ( $oldToken != $this->getValueFromPost( 'text_ebay_token' ) ) {
				self::updateOption( 'ebay_token', $this->getValueFromPost( 'text_ebay_token' ) );
				$this->initEC();
				$UserID = $this->EC->GetUser();
				$this->EC->closeEbay();
				$this->showMessage( __('Your token was changed.','wplister') );
				$this->showMessage( __('Your UserID is','wplister') . ' ' . $UserID );
			}

			$this->showMessage( __('Settings updated.','wplister') );

		}
	}
	
	protected function loadProductCategories() {
	global $wpdb;

		$flatlist = array();
		$tree = get_terms( ProductWrapper::getTaxonomy(), 'orderby=count&hide_empty=0' );

		if ( ! is_wp_error($tree) ) {
			$result = $this->parseTree( $tree );
			$flatlist = $this->printTree( $result );
			// echo "<pre>";print_r($flatlist);echo "</pre>";		
		}

		return $flatlist;
	}

	// parses wp terms array into a hierarchical tree structure
	function parseTree( $tree, $root = 0 ) {
		$return = array();

		// Traverse the tree and search for direct children of the root
		foreach ( $tree as $key => $item ) {

			// A direct child item is found
			if ( $item->parent == $root ) {

				// Remove item from tree (we don't need to traverse this again)
				unset( $tree[ $key ] );
				
				// Append the item into result array and parse its children
				$item->children = $this->parseTree( $tree, $item->term_id );
				$return[] = $item;

			}
		}
		return empty( $return ) ? null : $return;
	}

	function printTree( $tree, $depth = 0, $result = array() ) {
		$categories_map_ebay  = self::getOption( 'categories_map_ebay'  );
		$categories_map_store = self::getOption( 'categories_map_store' );
	    if( ($tree != 0) && (count($tree) > 0) ) {
	        foreach($tree as $node) {
	        	// indent category name accourding to depth
	            $node->name = str_repeat('&ndash; ' , $depth) . $node->name;
	            // echo $node->name;
	            
	            // get ebay category and (full) name
	            $ebay_category_id  = @$categories_map_ebay[$node->term_id];
	            $store_category_id = @$categories_map_store[$node->term_id];

	            // add item to results - excluding children
	            $tmpnode = array(
					'term_id'             => $node->term_id,
					'parent'              => $node->parent,
					'category'            => $node->name,
					'ebay_category_id'    => $ebay_category_id,
					'ebay_category_name'  => EbayCategoriesModel::getFullEbayCategoryName( $ebay_category_id ),
					'store_category_id'   => $store_category_id,
					'store_category_name' => EbayCategoriesModel::getFullStoreCategoryName( $store_category_id ),
					'description'         => $node->description
	            );

	            $result[] = $tmpnode;
	            $result = $this->printTree( $node->children, $depth+1, $result );
	        }
	    }
	    return $result;
	}




    // export rulesets as csv
    protected function handleImportCategoriesMap() {

        $uploaded_file = $this->process_upload();
        if (!$uploaded_file) return;

        // handle JSON export
        $json = file_get_contents($uploaded_file);
        $data = json_decode($json, true);
        // echo "<pre>";print_r($data);echo"</pre>";#die();

        if ( is_array($data) && ( sizeof($data) == 3 ) ) {

			// save categories mapping
			self::updateOption( 'categories_map_ebay',		$data['categories_map_ebay'] );
			self::updateOption( 'categories_map_store',		$data['categories_map_store'] );
			self::updateOption( 'default_ebay_category_id', $data['default_ebay_category_id'] );

			// show result
            $count_ebay  = sizeof($data['categories_map_ebay']);
            $count_store = sizeof($data['categories_map_store']);
            $this->showMessage( $count_ebay . ' ebay categories and '.$count_store.' store categories were imported.');

        } else {
            $this->showMessage( 'The uploaded file could not be imported. Please make sure you use a JSON backup file exported from this plugin.');                
        }

    }

    // export rulesets as csv
    protected function handleExportCategoriesMap() {

    	// get data
        $data = array();
		$data['categories_map_ebay']  		= self::getOption( 'categories_map_ebay'  );
		$data['categories_map_store'] 		= self::getOption( 'categories_map_store' );
		$data['default_ebay_category_id'] 	= self::getOption( 'default_ebay_category_id' );

        // send JSON file
        header("Content-Disposition: attachment; filename=wplister_categories.json");
        echo json_encode( $data );
        exit;

    }


    /**
     * process file upload
     **/
    public function process_upload() {

        $this->target_path = WP_CONTENT_DIR.'/uploads/wplister_categories.json';

        if(isset($_FILES['wpl_file_upload'])) {

            $target_path = $this->target_path;
            //echo "<br />Target Path: ".$target_path;

            // delete last import
            if ( file_exists($target_path) ) unlink($target_path);

            // echo '<div id="message" class="X-updated X-fade"><p>';
            if(move_uploaded_file($_FILES['wpl_file_upload']['tmp_name'], $target_path))
            {
                // echo "The file ".  basename( $_FILES['wpl_file_upload']['name'])." has been uploaded";               
                // $file_name = WP_CSV_TO_DB_URL.'/uploads/'.basename( $_FILES['wpl_file_upload']['name']);
                // update_option('wp_csvtodb_input_file_url', $file_name);
                // return true;
                return $target_path;
            } 
            else
            {
                echo "There was an error uploading the file, please try again!";
            }
            // echo '</p></div>';
            return false;
        }
        echo "no file_upload set";
        return false;
    }













	protected function handleCronSettings( $schedule ) {
        $this->logger->info("handleCronSettings( $schedule )");

        // remove scheduled event
	    $timestamp = wp_next_scheduled( 'wplister_update_auctions' );
    	wp_unschedule_event($timestamp, 'wplister_update_auctions' );

		if ( !wp_next_scheduled( 'wplister_update_auctions' ) ) {
			wp_schedule_event(time(), $schedule, 'wplister_update_auctions');
		}
        
	}


	public function onWpPrintStyles() {

		// jqueryFileTree
		wp_register_style('jqueryFileTree_style', self::$PLUGIN_URL.'/js/jqueryFileTree/jqueryFileTree.css' );
		wp_enqueue_style('jqueryFileTree_style'); 

	}

	public function onWpEnqueueScripts() {

		// jqueryFileTree
		wp_register_script( 'jqueryFileTree', self::$PLUGIN_URL.'/js/jqueryFileTree/jqueryFileTree.js', array( 'jquery' ) );
		wp_enqueue_script( 'jqueryFileTree' );

	}

	public function renderSettingsOptions() {
		?>
		<div class="hidden" id="screen-options-wrap" style="display: block;">
			<form method="post" action="" id="dev-settings">
				<h5>Show on screen</h5>
				<div class="metabox-prefs">
						<label for="dev-hide">
							<input type="checkbox" onclick="jQuery('#DeveloperToolBox').toggle();" value="dev" id="dev-hide" name="dev-hide" class="hide-column-tog">
							Developer options
						</label>
					<br class="clear">
				</div>
			</form>
		</div>
		<?php
	}

}
