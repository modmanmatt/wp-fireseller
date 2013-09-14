<?php
/*
Plugin Name: WP-FireSeller
Plugin URI: http://calicotek.com/wp-fireseller
Description: This plugin Adds an Ecommerce Multi Platform Product Feed and Management System... Sell on all ecommerce auction and social selling platforms all from 1 place your wp site :) This is a beta.
Version: 1.1.2
Author: calicotek, calicotek.com
Author URI: http://calicotek.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Version Definition should be same as above
define('WP_FIRESELLER_VERSION', '1.1.2' );

// For debugging purposes
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//define('WP-DEBUG', true);

/* Version check */
global $wp_version;
$exit_msg=__('WP FireSeller Tools requires WordPress version 3.0 or higher; please update first.', 'wp_fireseller');
if (version_compare($wp_version,"3.0","<"))
{
	exit ($exit_msg);
}

//include base classes
// define('WPFIRESELLER_PATH', realpath( dirname(__FILE__) ) );
// define('WPFIRESELLER_URL', plugins_url() . '/' . basename(dirname(__FILE__)) . '/' );
// require_once( WPFIRESELLER_PATH . '/classes/core/WPL_Autoloader.php' );
  

// Set-up Action and Filter Hooks
register_activation_hook(__FILE__, 'wp_fireseller_add_defaults');  // add action hook defaults to database
register_uninstall_hook(__FILE__, 'wp_fireseller_delete_plugin_options');  // clean and delete old plugin options if option to complete remove is used
add_action('admin_init', 'wp_fireseller_init' );
add_action('admin_menu', 'wp_fireseller_add_options_page'); // Register options Page
add_filter( 'plugin_action_links', 'wp_fireseller_plugin_action_links', 10, 2 ); // adds setting link to plugin installer page
add_action( 'admin_menu', 'register_wp_fireseller_pages' ); // register dash menu and page action

// Delete options table entries ONLY when plugin deactivated AND deleted
function wp_fireseller_delete_plugin_options() {
	delete_option('wp_fireseller_options');
}

// Define default option settings
function wp_fireseller_add_defaults() {
	$tmp = get_option('wp_fireseller_options');
	if(($tmp['chk_default_options_db']=='1')||(!is_array($tmp))) {
		delete_option('wp_fireseller_options'); // so we don't have to reset all the 'off' checkboxes too! (don't think this is needed but leave for now)
		$arr = array(
		    'widget_title' => __('WP FireSeller Tools', 'wp_fireseller'),
			'fireseller_url' => 'http://calicotek.com/category/calicotek_news_feed/calicotek_members_news_feed/feed/',
			'drp_select_box' => '5',
		  
			'fireseller_widget_title' => __('WP FireSeller Tools', 'wp_fireseller'),
			'fireseller_url' => 'http://calicotek.com/category/calicotek_news_feed/calicotek_members_news_feed/feed/',
			'fireseller_drp_select_box' => '5',
		  
			'ebay_widget_title' => __('WP FireSeller Tools', 'wp_fireseller_ebay'),
			'ebay_url' => 'http://calicotek.com/category/calicotek_news_feed/calicotek_members_news_feed/feed/',
			'ebay_drp_select_box' => '5',
		  
		    'amazon_widget_title' => __('WP FireSeller Tools', 'wp_fireseller_a'),
			'amazon_url' => 'http://calicotek.com/category/calicotek_news_feed/calicotek_members_news_feed/feed/',
			'amazon_drp_select_box' => '5',
		  
		    'etsy_widget_title' => __('WP FireSeller Tools', 'wp_fireseller'),
			'etsy_url' => 'http://calicotek.com/category/calicotek_news_feed/calicotek_members_news_feed/feed/',
			'etsy_drp_select_box' => '5',
		    
		    'craigslist_widget_title' => __('WP FireSeller Tools', 'wp_fireseller'),
			'craigslist_url' => 'http://calicotek.com/category/calicotek_news_feed/calicotek_members_news_feed/feed/',
			'craigslist_drp_select_box' => '5',
		  
		    'facebook_widget_title' => __('WP FireSeller Tools', 'wp_fireseller'),
			'facebook_url' => 'http://calicotek.com/category/calicotek_news_feed/calicotek_members_news_feed/feed/',
			'facebook_drp_select_box' => '5',
		  
		    'twitter_widget_title' => __('WP FireSeller Tools', 'wp_fireseller'),
			'twitter_url' => 'http://calicotek.com/category/calicotek_news_feed/calicotek_members_news_feed/feed/',
			'twitter_drp_select_box' => '5',
		   
		    'linkedin_widget_title' => __('WP FireSeller Tools', 'wp_fireseller'),
			'linkedin_url' => 'http://calicotek.com/category/calicotek_news_feed/calicotek_members_news_feed/feed/',
			'linkedin_drp_select_box' => '5',
		  
		    'pinterest_widget_title' => __('WP FireSeller Tools', 'wp_fireseller'),
			'pinterest_url' => 'http://calicotek.com/category/calicotek_news_feed/calicotek_members_news_feed/feed/',
			'pinterest_drp_select_box' => '5',
		  
		   'chk_default_options_db' => ''
		);
		update_option('wp_fireseller_options', $arr);
	}
}


// Init plugin options to white list our options
function wp_fireseller_init(){
	register_setting( 'wp_fireseller_plugin_options', 'wp_fireseller_options', 'wp_fireseller_validate_options' );
	load_plugin_textdomain( 'wp_fireseller' );
}

	if(!load_plugin_textdomain('wp_fireseller','/wp-content/languages/'))
		load_plugin_textdomain('wp_fireseller', false, basename( dirname( __FILE__ ) ) . '/languages' );

// Add menu page
function wp_fireseller_add_options_page() {
	add_options_page('WP FireSeller Options Settings', 'WP-FireSeller', 'manage_options', __FILE__, 'wp_fireseller_fireseller_options');
	add_options_page('WP FireSeller Options Settings', 'WP-FireSeller', 'manage_options', __FILE__, 'wp_fireseller_ebay_options');
	add_options_page('WP FireSeller Options Settings', 'WP-FireSeller', 'manage_options', __FILE__, 'wp_fireseller_amazon_options');
	add_options_page('WP FireSeller Options Settings', 'WP-FireSeller', 'manage_options', __FILE__, 'wp_fireseller_etsy_options');
	add_options_page('WP FireSeller Options Settings', 'WP-FireSeller', 'manage_options', __FILE__, 'wp_fireseller_craigslist_options');
	add_options_page('WP FireSeller Options Settings', 'WP-FireSeller', 'manage_options', __FILE__, 'wp_fireseller_facebook_options');
	add_options_page('WP FireSeller Options Settings', 'WP-FireSeller', 'manage_options', __FILE__, 'wp_fireseller_twitter_options');
	add_options_page('WP FireSeller Options Settings', 'WP-FireSeller', 'manage_options', __FILE__, 'wp_fireseller_linkedin_options');
	add_options_page('WP FireSeller Options Settings', 'WP-FireSeller', 'manage_options', __FILE__, 'wp_fireseller_pinterest_options');
}


// Sart Plugin Options Page
// Render the Plugin options form
function wp_fireseller_fireseller_options() { require "options/fireseller-options.php"; }
function wp_fireseller_ebay_options() { require "options/ebay-options.php"; }
function wp_fireseller_amazon_options() { require "options/amazon-options.php"; }
function wp_fireseller_etsy_options() { require "options/etsy-options.php"; }
function wp_fireseller_criagslist_options() { require "options/craigslist-options.php"; }
function wp_fireseller_facebook_options() { require "options/facebook-options.php"; }
function wp_fireseller_twitter_options() { require "options/twitter-options.php"; }
function wp_fireseller_linkedin_options() { require "options/linkedin-options.php"; }
function wp_fireseller_pinterest_options() { require "options/pinterest-options.php"; }	




// Sanitize and validate input. Accepts an array, return a sanitized array.
function wp_fireseller_validate_options($input) {
	// strip html from textboxes
	$input['widget_title'] =  wp_filter_nohtml_kses($input['widget_title']); // Sanitize input (strip html tags, and escape characters)
	$input['feed_url'] =  wp_filter_nohtml_kses($input['feed_url']); // Sanitize input (strip html tags, and escape characters)
	return $input;
}

// Display a Settings link on the main Plugins page
function wp_fireseller_plugin_action_links($links, $file) {

	if ( $file == plugin_basename( __FILE__ ) ) {
	    // the anchor tag and href to the URL we want. For a "Settings" link, this needs to be the url of your settings page
       	$wp_fireseller_links = '<a href="'.get_admin_url().'options-general.php?page=wp-fireseller/index.php">'.__('Settings', 'wp_fireseller').'</a>';
		// make the 'Settings' link appear first
		array_unshift( $links, $wp_fireseller_links );
	}

	return $links;
}


// Add Feed Dashboard Widget
function wp_fireseller_setup_function() {
	$options = get_option('wp_fireseller_options');
	$widgettitle = $options['widget_title'];
	add_meta_box( 'wp_fireseller_widget',  $widgettitle, 'wp_fireseller_widget_function', 'dashboard', 'normal', 'high' );
}

function wp_fireseller_widget_function() {
	$options = get_option('wp_fireseller_options');
	$feedurl = $options['feed_url'];
	$select = $options['drp_select_box'];

	$rss = fetch_feed($feedurl);
	if (!is_wp_error($rss)) { // Checks that the object is created correctly
	// Figure out how many total items there are, but limit it to 3.
	$maxitems = $rss->get_item_quantity($select);
	// Build an array of all the items, starting with element 0 (first element).
	$rss_items = $rss->get_items(0, $maxitems);
	}
	if (!empty($maxitems)) {
?>

<!-- Start Widget  top buttons Output-->
<center>
 
    <div class="cct_widget_menu">
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
    </div>

</center>

	
  <!-- Start Widget Scroller feed Output -->
  <div class="scroller">
		<ul>
<?php
    // Loop through each feed item and display each item as a hyperlink.
    foreach ($rss_items as $item) {

?>
		<li><span class="rss-date"><?php echo $item->get_date('j F Y'); ?> </span><a class="rsswidget" href='<?php echo $item->get_permalink(); ?>'><?php echo $item->get_title(); ?></a> </li>
<?php } ?>
	</ul>
  </div>
	
	  <!-- Start Widget bottom buttons Output-->
  
<?php
									 											
}
	$x = is_rtl() ? 'left' : 'right'; // This makes sure that the positioning is also correct for right-to-left languages
	echo '<style type="text/css">#wp_fireseller_widget {float:$x;}</style>';
}
 // End Widget Scroller feed Output 

// End Widget Output-->

// Register the new dashboard widget into the 'wp_dashboard_setup' action
add_action( 'wp_dashboard_setup', 'wp_fireseller_setup_function' );

// Adds stylesheet
add_action( 'admin_print_styles', 'wp_fireseller_load_custom_admin_css' );


// The load CSS function
function wp_fireseller_load_custom_admin_css() {
	wp_enqueue_style( 'wp_fireseller_custom_admin_css', plugins_url( '/style.css', __FILE__ ) );
}

// ---------------------------------------- extra widgets start
// Function that outputs the contents of the dashboard widget
//function ebay_dashboard_widget_function() {	require "widgets/fireseller-dash-widget.php";  }
function ebay_dashboard_widget_function() {	require "widgets/ebay-dash-widget.php";  }
function amazon_dashboard_widget_function() { require "widgets/amazon-dash-widget.php";  }
function etsy_dashboard_widget_function() {	require "widgets/etsy-dash-widget.php";  }
function facebook_dashboard_widget_function() {	require "widgets/facebook-dash-widget.php";  }
function twitter_dashboard_widget_function() { require "widgets/twitter-dash-widget.php"; }
function linkedin_dashboard_widget_function() { require "widgets/linkedin-dash-widget.php"; }
function pinterest_dashboard_widget_function() { require "widgets/pinterest-dash-widget.php"; }
function craigslist_dashboard_widget_function() { require "widgets/craigslist-dash-widget.php"; }

// Function used in the action hook
function add_dashboard_widgets() {
  //wp_add_dashboard_widget('fireseller_dashboard_widget', 'FireSeller Widget', 'fireseller_dashboard_widget_function');
	wp_add_dashboard_widget('ebay_dashboard_widget', 'eBay FireSeller Widget', 'ebay_dashboard_widget_function');
    wp_add_dashboard_widget('amazon_dashboard_widget', 'Amazon FireSeller Widget', 'amazon_dashboard_widget_function');
	wp_add_dashboard_widget('etsy_dashboard_widget', 'Etsy FireSeller Widget', 'etsy_dashboard_widget_function');
	wp_add_dashboard_widget('facebook_dashboard_widget', 'Facebook FireSeller Widget', 'facebook_dashboard_widget_function');
  	wp_add_dashboard_widget('twitter_dashboard_widget', 'Twitter FireSeller Widget', 'twitter_dashboard_widget_function');
  	wp_add_dashboard_widget('linkedin_dashboard_widget', 'Linkedin FireSeller Widget', 'linkedin_dashboard_widget_function');
  	wp_add_dashboard_widget('pinterest_dashboard_widget', 'Pinterest FireSeller Widget', 'pinterest_dashboard_widget_function');
    wp_add_dashboard_widget('craigslist_dashboard_widget', 'Craigslist FireSeller Widget', 'craigslist_dashboard_widget_function');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );
// ---------------------------------------- extra widgets end

// Start admin Menu and Page Install code.
// add admin menu function to system for the menu
function register_wp_fireseller_pages(){ // Register the dash menu and page function the number 3 is the menu position system higher numbers move it down the list
    add_menu_page( 'WP Fire Seller', 'WP-FireSeller', 'manage_options', 'wp_fireseller_page', 'wp_fireseller_menu_page', plugins_url( 'wp-fireseller/images/fire_seller_icon.png' )); 
    add_submenu_page( 'wp_fireseller_page', 'FireSeller Settings Page', 'Settings', 'manage_options','wp_fireseller_fireseller_options','wp_fireseller_fireseller_options');// retreive the dashboard page code from dashpage.php and display the page when the menu button is clicked
    add_submenu_page( 'wp_fireseller_page', 'FireSeller Ebay Page', 'Ebay Tools', 'manage_options', 'wp_fireseller_ebay_page', 'wp_fireseller_ebay_menu_page');// retreive the dashboard page code from dashpage.php and display the page when the menu button is clicked
    add_submenu_page( 'wp_fireseller_page', 'FireSeller Amazon Page', 'Amazon Tools', 'manage_options', 'wp_fireseller_amazon_page', 'wp_fireseller_amazon_menu_page');// retreive the dashboard page code from dashpage.php and display the page when the menu button is clicked
    add_submenu_page( 'wp_fireseller_page', 'FireSeller Etsy Page', 'Etsy Tools', 'manage_options', 'wp_fireseller_etsy_page', 'wp_fireseller_etsy_menu_page');// retreive the dashboard page code from dashpage.php and display the page when the menu button is clicked
    add_submenu_page( 'wp_fireseller_page', 'FireSeller Twitter Page', 'Twitter Tools', 'manage_options', 'wp_fireseller_twitter_page', 'wp_fireseller_twitter_menu_page');// retreive the dashboard page code from dashpage.php and display the page when the menu button is clicked
    add_submenu_page( 'wp_fireseller_page', 'FireSeller Facebook Page', 'Facebook Tools', 'manage_options', 'wp_fireseller_facebook_page', 'wp_fireseller_facebook_menu_page');// retreive the dashboard page code from dashpage.php and display the page when the menu button is clicked
    add_submenu_page( 'wp_fireseller_page', 'FireSeller Pinterest Page', 'Pinterest Tools', 'manage_options', 'wp_fireseller_pinterest_page', 'wp_fireseller_pinterest_menu_page');// retreive the dashboard page code from dashpage.php and display the page when the menu button is clicked
    add_submenu_page( 'wp_fireseller_page', 'FireSeller linkedin Page', 'Linkedin Tools', 'manage_options', 'wp_fireseller_linkedin_page', 'wp_fireseller_linkedin_menu_page');// retreive the dashboard page code from dashpage.php and display the page when the menu button is clicked
    add_submenu_page( 'wp_fireseller_page', 'FireSeller craigslist Page', 'Craigslist Tools', 'manage_options', 'wp_fireseller_craigslist_page', 'wp_fireseller_craigslist_menu_page');// retreive the dashboard page code from dashpage.php and display the page when the menu button is clicked
}

function wp_fireseller_menu_page(){ require_once( 'pages/fireseller-page.php' );	}
function wp_fireseller_ebay_menu_page(){ require_once( 'pages/ebay-page.php' );	}
function wp_fireseller_amazon_menu_page(){ require_once( 'pages/amazon-page.php' );	}
function wp_fireseller_etsy_menu_page(){ require_once( 'pages/etsy-page.php' );	}
function wp_fireseller_pinterest_menu_page(){ require_once( 'pages/pinterest-page.php' );	}
function wp_fireseller_facebook_menu_page(){ require_once( 'pages/facebook-page.php' );	}
function wp_fireseller_twitter_menu_page(){ require_once( 'pages/twitter-page.php' );	}
function wp_fireseller_linkedin_menu_page(){ require_once( 'pages/linkedin-page.php' );	}
function wp_fireseller_craigslist_menu_page(){ require_once( 'pages/craigslist-page.php' );	}
// End admin Menu and Page Install code

  

add_action('admin_bar_menu', 'fireseller_add_tool_bar_items', 100);
function fireseller_add_tool_bar_items($admin_bar)
{
  
  $admin_bar->add_menu( array(
		'id'    => 'fireseller',
		'title' => 'FireSeller',
		'href'  => '#',
		'meta'  => array(
			'title' => __('FireSeller'),			
		),
	));
	  $admin_bar->add_menu( array(
		'id'    => 'settings-page',
		'parent' => 'fireseller',
		'title' => 'Settings',
		'href'  => '#',
		'meta'  => array(
			'title' => __('Settings'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
      $admin_bar->add_menu( array(
		'id'    => 'ebay-tools',
		'parent' => 'fireseller',
		'title' => 'Ebay Tools',
		'href'  => '#',
		'meta'  => array(
			'title' => __('Ebay Tools'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
      $admin_bar->add_menu( array(  // sub menu of ebay
		'id'    => 'ebay-dashboard-tools',
		'parent' => 'ebay-tools',
		'title' => 'Ebay Dashboard',
		'href'  => '#',
		'meta'  => array(
			'title' => __('Ebay Tools'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
      $admin_bar->add_menu( array(  // sub menu of ebay
		'id'    => 'ebay-goto',
		'parent' => 'ebay-tools',
		'title' => 'GoTo My Ebay',
		'href'  => '#',
		'meta'  => array(
			'title' => __('GoTo My Ebay'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	)); // end ebay sub menu
      $admin_bar->add_menu( array(
		'id'    => 'amazon-tools',
		'parent' => 'fireseller',
		'title' => 'Amazon Tools',
		'href'  => '#',
		'meta'  => array(
			'title' => __('Amazon Tools'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
      $admin_bar->add_menu( array(
		'id'    => 'etsy-tools',
		'parent' => 'fireseller',
		'title' => 'Etsy Tools',
		'href'  => '#',
		'meta'  => array(
			'title' => __('Etsy Tools'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
      $admin_bar->add_menu( array(
		'id'    => 'craigslist-tools',
		'parent' => 'fireseller',
		'title' => 'Craigslist Tools',
		'href'  => '#',
		'meta'  => array(
			'title' => __('Craigslist Tools'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
      $admin_bar->add_menu( array(
		'id'    => 'facebook-tools',
		'parent' => 'fireseller',
		'title' => 'Facebook Tools',
		'href'  => '#',
		'meta'  => array(
			'title' => __('Facebook Tools'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
      $admin_bar->add_menu( array(
		'id'    => 'twitter-tools',
		'parent' => 'fireseller',
		'title' => 'Twitter Tools',
		'href'  => '#',
		'meta'  => array(
			'title' => __('Twitter Tools'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
      $admin_bar->add_menu( array(
		'id'    => 'linkedin-tools',
		'parent' => 'fireseller',
		'title' => 'Linkedin Tools',
		'href'  => '#',
		'meta'  => array(
			'title' => __('Linkedin Tools'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
    ));
      $admin_bar->add_menu( array(
		'id'    => 'pinterest-tools',
		'parent' => 'fireseller',
		'title' => 'Pinterest Tools',
		'href'  => '#',
		'meta'  => array(
			'title' => __('Pinterest Tools'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	  ));
}
  
?>