<?php
/*
Plugin Name: WP-FireSeller
Plugin URI: http://fireflytechnologies.com/wp-fireseller
Description: This plugin Adds an Ecommerce Multi Platform Product Feed and Management System... Sell on all ecommerce auction and social selling platforms all from 1 place your wp site :) This is a beta.
Version: 1.0.8
Author: fireflytechnologies, FireFlyTechnologies.com
Author URI: http://fireflytechnologies.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Version Definition should be same as above
define('WPFIRESELLER_VERSION', '1.0.8' );

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
add_action( 'admin_menu', 'register_wp_fireseller_dash_menu_page' ); // register dash menu and page action

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
			'feed_url' => 'http://announcements.ebay.com/feed/',
			'drp_select_box' => '5',
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
	add_options_page('WP FireSeller Options Settings', 'WP-FireSeller', 'manage_options', __FILE__, 'wp_fireseller_render_form');
}


// Sart Plugin Options Page
// Render the Plugin options form
function wp_fireseller_render_form() {
	?>
	<div class="wrap">
		<!-- Display Plugin Icon, Header, and Description -->
	  <table style="width:100%;">
		<tr>
		  <td><div class="icon32" id="icon-options-general"></div><h2><?php _e('WP FireSeller Options Settings', 'wp_fireseller'); ?> 
		  </h2></td>
		  <td width="49%" align="right"><h2>Version : <?php echo WPFIRESELLER_VERSION; ?>  Developed by: <a href="http://fireflytechnologies.com/">FireFlyTechnology.Com</a></h2></td>
		</tr>
	  </table><hr />
	  <!-- Start Donation Plugin Info Heml -->
	  <table class="table_settings_page" style="width:100%;border:1;  ">
			<tr>
			  <td style="background-color:#FFFF99;" Align="center">		  
			  
		   
		    <!-- End Donation Plugin Info Heml -->
	  <b><i>Tip: </i></b><?php _e('Below you can adjust the output of the Dashboard Widget. You can change the title of the widget, the feed URL and the amount of feed items to show.', 'wp_fireseller'); ?>

		<!-- Beginning of the Plugin Options Form -->
		<form method="post" action="options.php">
			<?php settings_fields('wp_fireseller_plugin_options'); ?>
			<?php $options = get_option('wp_fireseller_options'); ?>

		  
			<!-- Table Structure Containing Form Controls -->
			<!-- Each Plugin Option Defined on a New Table Row -->
		  <table  style="color:#666666;margin-left:2px;width:100%;">

				<!-- Textbox Control -->
				<tr>
					<th scope="row"><?php _e('Widget Title', 'wp_fireseller'); ?></th>
					<td>
						<input type="text" size="30" name="wp_fireseller_options[widget_title]" value="<?php echo $options['widget_title']; ?>" />
						<span style="color:#666666;margin-left:2px;"><?php _e('Change the title of the WP FireSeller Dash Widget into something of your liking', 'wp_fireseller'); ?></span>
					</td>
				</tr>

				<!-- Textbox Control -->
				<tr>
					<th scope="row"><?php _e('Feed URL', 'wp_fireseller'); ?></th>
					<td>
						<input type="text" size="30" name="wp_fireseller_options[feed_url]" value="<?php echo $options['feed_url']; ?>" />
						<span style="color:#666666;margin-left:2px;"><?php _e('This is to Ebay Announcements feed by Default ... if you need to Change the feed-URL you may do so here', 'wp_fireseller'); ?></span>
					</td>
				</tr>

				<!-- Select Drop-Down Control -->
				<tr>
					<th scope="row"><?php _e('Feed Item Amount?', 'wp_fireseller'); ?></th>
					<td>
						<select name='wp_fireseller_options[drp_select_box]'>
							<option value='1' <?php selected('1', $options['drp_select_box']); ?>>1</option>
							<option value='2' <?php selected('2', $options['drp_select_box']); ?>>2</option>
							<option value='3' <?php selected('3', $options['drp_select_box']); ?>>3</option>
							<option value='4' <?php selected('4', $options['drp_select_box']); ?>>4</option>
							<option value='5' <?php selected('5', $options['drp_select_box']); ?>>5</option>
							<option value='7' <?php selected('7', $options['drp_select_box']); ?>>7</option>
							<option value='10' <?php selected('10', $options['drp_select_box']); ?>>10</option>
						</select>
						<span style="color:#666666;margin-left:2px;"><?php _e('How many feed items to show in the widget?', 'wp_fireseller'); ?></span>
					</td>
				</tr>
				<tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php _e('Database Options', 'wp_fireseller'); ?></th>
					<td>
						<label><input name="wp_fireseller_options[chk_default_options_db]" type="checkbox" value="1" <?php if (isset($options['chk_default_options_db'])) { checked('1', $options['chk_default_options_db']); } ?> /> <?php _e('Restore defaults upon plugin deactivation/reactivation', 'wp_fireseller'); ?></label>
					  <br /><span style="color:#666666;margin-left:2px;"><?php _e('Only check this if you want to reset plugin settings upon Plugin reactivation', 'wp_fireseller'); ?></span>
					</td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Settings', 'wp_fireseller') ?>" />
			</p>
				</form>
			  </td><td width="200px" align"center"><p>Version 			  
			 <?php echo WPFIRESELLER_VERSION; ?>  by FireFly Technologies</p> <hr/>Like this Plugin? Please <a href="http://fireflytechnologies.com/donate">Donate!</a><hr/>
				Help its Creator Create more great plugins and Updates<a href="http://fireflytechnologies.com/donate">Donate Now!</a><hr />Need Help or Installition Instructions?... <a href="http://fireflytechnologies.com/donate">Try here</a>
			  <hr/>Other Great Plugins<br> by CaliCoTek
			  <ul>
				<li>CaliCoTek Floating Social Slider</li>
				<li>Calicotek Membership Dashboard</li>
			  </ul>
			  </td>
			
			  </tr>
		  </table>

	  
<!-- End Plugin Options Page -->

<?php
}

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
  <table>
    <div class="cct_widget_menu">
      <td><a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="40px" width="40px" title="Open MyEbay in New Window" /></a></td>
      <td><a href="http://my.ebay.com/ws/eBayISAPI.dll?MyEbay&gbh=1&CurrentPage=MyeBayAllSelling" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/selling-manager.gif" height="40px" width="40px" title="Open MyEbay Advanced Selling Manager" /></a></td>
	  <td><a href="http://cgi6.ebay.com/ws/eBayISAPI.dll?SellerDashboard" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/dashboard-icon.gif" height="40px" width="40px" title="MyEbay Seller Dashboard" /></a></td>

	  <td><a href="http://www2.ebay.com/aw/announce.xml" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/money_sign.jpg" height="40px" width="40px" title="Lessons" /></a></td>
      <td><a href="http://mesgmy.ebay.com/ws/eBayISAPI.dll?ViewMyMessages" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/messages.gif" height="40px" width="40px" title="My Messages from Ebay" /></a></td>
      <td><a href="http://mystore.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/icon-ebay.png" height="40px" width="40px" title="My Store" /></a></td>
    </div>
  </table>
</center>

  <div class="cct_widget">
	<center>
	  <a href="http://announcements.ebay.com/" target="_blank"><font size="+1"><b><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/down-arrow.png" height="30px" width="30px">Ebay Announcements<img src="<?php echo plugins_url(); ?>/wp-fireseller/images/down-arrow.png" height="30px" width="30px"></b></font></a>
	</center></div>
	
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
  
	  Plugin  by: <a href="http://fireflytechnology.com">fireflytechnology.Com</a> <br/> <a href="http://fireflytechnology.Com/donate">Donate</a> | <a href="http://fireflytechnology.Com/fireseller-pro/">Purchase Pro Version</a>   

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
function linkdin_dashboard_widget_function() { require "widgets/linkdin-dash-widget.php"; }
function pinterest_dashboard_widget_function() { require "widgets/pinterest-dash-widget.php"; }

// Function used in the action hook
function add_dashboard_widgets() {
  //wp_add_dashboard_widget('fireseller_dashboard_widget', 'FireSeller Widget', 'fireseller_dashboard_widget_function');
	wp_add_dashboard_widget('ebay_dashboard_widget', 'eBay FireSeller Widget', 'ebay_dashboard_widget_function');
    wp_add_dashboard_widget('amazon_dashboard_widget', 'Amazon FireSeller Widget', 'amazon_dashboard_widget_function');
	wp_add_dashboard_widget('etsy_dashboard_widget', 'Etsy FireSeller Widget', 'etsy_dashboard_widget_function');
	wp_add_dashboard_widget('facebook_dashboard_widget', 'Facebook FireSeller Widget', 'facebook_dashboard_widget_function');
  	wp_add_dashboard_widget('twitter_dashboard_widget', 'Twitter FireSeller Widget', 'twitter_dashboard_widget_function');
  	wp_add_dashboard_widget('linkdin_dashboard_widget', 'Linkdin FireSeller Widget', 'linkdin_dashboard_widget_function');
  	wp_add_dashboard_widget('pinterest_dashboard_widget', 'Pinterest FireSeller Widget', 'pinterest_dashboard_widget_function');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );
// ---------------------------------------- extra widgets end

// Start admin Menu and Page Install code.
// add admin menu function to system for the menu
function register_wp_fireseller_dash_menu_page(){ // Register the dash menu and page function the number 3 is the menu position system higher numbers move it down the list
    add_menu_page( 'WP Fire Seller', 'WP-FireSeller', 'manage_options', 'wp_fireseller_page', 'wp_fireseller_menu_page', plugins_url( 'wp-fireseller/images/fire_seller_icon.png' )); 
}
// retreive the dashboard page code from dashpage.php and display the page when the menu button is clicked
function wp_fireseller_menu_page(){
    require_once( 'dashpage.php' );	
}
// End admin Menu and Page Install code
  
  
?>