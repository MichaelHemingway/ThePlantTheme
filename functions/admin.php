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



/** Add post size types
* Replaces the deprecated post classes feature, controlling post sizes in the loop via css classes.
* @since Plant W2017
*/
function post_size() {
	add_meta_box('post_size', 'Post Visibility', 'post_size_meta', 'post' );
	//you can change the 4th paramter i.e. post to custom post type name, if you want it for something else

}

add_action( 'add_meta_boxes', 'post_size' );

function post_size_meta( $post ) {
	 wp_nonce_field( 'post_size', 'post_size_nonce' );
	 $value = get_post_meta( $post->ID, 'post_size', true ); // post_size is a meta_key. Change it to whatever you want
?>
<input type="radio" name="image_align" value="" <?php checked( $value, '' ); ?>> Default <br>
<input type="radio" name="image_align" value="medium" <?php checked( $value, 'medium' ); ?> > Medium <br>
<input type="radio" name="image_align" value="large" <?php checked( $value, 'large' ); ?> > Large <br>
<input type="radio" name="image_align" value="centerfold" <?php checked( $value, 'centerfold' ); ?> > Centerfold <br>

<?php
}

function ps_save_meta_box_data( $post_id ) {
	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( !isset( $_POST['post_size_nonce'] ) ) { return; }

	// Verify that the nonce is valid.
	if ( !wp_verify_nonce( $_POST['post_size_nonce'], 'post_size' ) ) { return; }

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }

	// Check the user's permissions.
	if ( !current_user_can( 'edit_post', $post_id ) ) { return; }

	// Sanitize user input.
	$new_meta_value = ( isset( $_POST['image_align'] ) ? sanitize_html_class( $_POST['image_align'] ) : '' );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'post_size', $new_meta_value );
}

add_action( 'save_post', 'ps_save_meta_box_data' );
