<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/************* DASHBOARD WIDGETS *****************/
// Disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// Remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget
	// Remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //
	// Removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

}

function custom_dashboard_help() {
	echo '<p>Welcome to The Plant! Need help? Contact the developer <a href="mailto:mikemingway@gmail.com">here</a>. For WordPress Tutorials visit: <a href="http://www.wpbeginner.com" target="_blank">WPBeginner</a></p>
	<style>#custom_help_widget h2 {
		background-image: url("'. get_template_directory_uri() .'/assets/img/icons/touch.png");
		background-repeat: no-repeat;
		color: white;
	}';
}

// Calling all custom dashboard widgets
function plant_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}

// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');
// adding any custom widgets
add_action('wp_dashboard_setup', 'plant_custom_dashboard_widgets');

/************* CUSTOMIZE ADMIN *******************/

// Changes the "developed with WordPress" to our thing
function remove_footer_admin () {
	echo '<span id="footer-thankyou">Developed by <a href="http://www.arthem.co" target="_blank">Arthem Co.</a></span>';
}

add_filter('admin_footer_text', 'remove_footer_admin');