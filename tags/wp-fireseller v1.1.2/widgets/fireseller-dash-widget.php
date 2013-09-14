<?php
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

    <div class="cct_widget_menu" align=center>
      <a href="http://my.ebay.com/" target="_blank"><img src="<?php echo plugins_url(); ?>/wp-fireseller/images/my-ebay-selling.gif" height="20px" width="20px" title="Open MyEbay in New Window" /></a>
      </div>
	
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
?>