<?php

/*------------------------------------*\
    External Modules
\*------------------------------------*/

// limit tags
add_filter('term_links-post_tag','limit_to_one_tag');
	function limit_to_one_tag($terms) {
	return array_slice($terms,0,1,true);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
	global $post;
	if (is_home()) {
		$key = array_search('blog', $classes);
		if ($key > - 1) {
			unset($classes[$key]);
		}
	}
	elseif (is_page()) {
		$classes[] = sanitize_html_class($post->post_name);
	}
	elseif (is_singular()) {
		$classes[] = sanitize_html_class($post->post_name);
	}
	return $classes;
}
add_filter('body_class', 'add_slug_to_body_class');

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function plant_pagination() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links(array(
		'base' => str_replace($big, '%#%', get_pagenum_link($big)) ,
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')) ,
		'total' => $wp_query->max_num_pages
	));
}
add_action('init', 'plant_pagination');

function add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/assets/img/icons/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

// Custom Gravatar in Settings > Discussion
function plant_gravatar($avatar_defaults) {
	$myavatar = get_template_directory_uri() . '/assets/img/gravatar.jpg';
	$avatar_defaults[$myavatar] = "Custom Gravatar";
	return $avatar_defaults;
}
add_filter('avatar_defaults', 'plant_gravatar'); // Custom Gravatar in Settings > Discussion

// Remove Admin bar
function remove_admin_bar() {
	return false;
}
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar

function post_nav_background() {
	if (!is_single()) {
		return;
	}
	$previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
	$next = get_adjacent_post(false, '', false);
	$css = '';
	if (is_attachment() && 'attachment' == $previous->post_type) {
		return;
	}
	if ($previous && has_post_thumbnail($previous->ID)) {
		$prevthumb = wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID) , 'large');
		$css.= '
			.post-navigation .nav-previous { background-image: url(' . esc_url($prevthumb[0]) . '); }
			.post-navigation .nav-previous .post-title-nav, .post-navigation .nav-previous a:hover .post-title-nav, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}
	if ($next && has_post_thumbnail($next->ID)) {
		$nextthumb = wp_get_attachment_image_src(get_post_thumbnail_id($next->ID) , 'large');
		$css.= '
			.post-navigation .nav-next { background-image: url(' . esc_url($nextthumb[0]) . '); border-top: 0; }
			.post-navigation .nav-next .post-title-nav, .post-navigation .nav-next a:hover .post-title-nav, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}
	echo "<style>" . $css . "</style>";
}
/*
*Author: Matt Dulin
*Author URI: http://mattdulin.com
*License: GPL2
*/
function plant_add_byline_taxonomy () {
	// Add new "bylines" taxonomy to Posts
	register_taxonomy('byline', 'post', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => false,
		'show_admin_column' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x('Bylines', 'taxonomy general name') ,
			'singular_name' => _x('Byline', 'taxonomy singular name') ,
			'search_items' => __('Search Bylines') ,
			'popular_items' => __('Popular Bylines') ,
			'all_items' => __('All Bylines') ,
			'edit_item' => __('Edit Byline') ,
			'update_item' => __('Update Byline') ,
			'separate_items_with_commas' => __('Separate bylines with commas') ,
			'add_new_item' => __('Add New Byline') ,
			'add_or_remove_items' => __('Add or remove bylines') ,
			'choose_from_most_used' => __('Choose from most used bylines') ,
			'new_item_name' => __('New Byline Name') ,
			'menu_name' => __('Bylines')
		) ,
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'byline', // This controls the base slug that will display before each term
			'with_front' => true, // Don't display the category base before "/bylines/"
			'show_tagcloud' => false, // We don't want to make prominent authors *too* prominent.
			'show_ui' => true
			// This will allow URL's like "/bylines/boston/cambridge/"
		) ,
	));
}
// Display the byline by replacing instances of the_author throughout most areas of the site
function byline($name)
{
	global $post;
	$author = get_the_term_list($post->ID, 'byline', '', ', ', '');
	if ($author && !is_admin() && !is_feed()) $name = $author;
	return $name;
	if ($author && is_feed()) //Preserves native Wordpress author for feeds
	$name = get_the_author();
	return $name;
}
add_action('init', 'plant_add_byline_taxonomy', 0); // Custom Bylines
add_filter('the_author', 'byline'); // Bylines display
add_filter('get_the_author_display_name', 'byline'); // Bylines setup

// Different headers based on categories
function get_my_header()
{
	if (!is_home() && !is_category()) {
		global $post;
		// get category by ID
		$category = get_the_category($post->ID);
		// first category slug
		$catslug = $category[0]->slug;
		// if there is a category slug call the header-$catslug.php
		if (isset($catslug) && (locate_template('headers/header-' . $catslug . '.php') != '')) {
			get_template_part('headers/header', $catslug);
		}
		else {
			// else call normal header.php
			get_header();
		} // ends !is_home()
		// else call normal header
	}
	else {
		get_header();
	} // ends isset()
}
add_filter('get_my_header', 'get_my_header'); // custom headers



if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_bylines',
		'title' => 'Bylines',
		'fields' => array (
			array (
				'key' => 'field_567ca4390c1e8',
				'label' => 'Profile Picture',
				'name' => 'byline_picture',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5682b4d67709c',
				'label' => 'Email',
				'name' => 'byline_email',
				'type' => 'email',
				'instructions' => 'It could be dangerous to add this, never author data without permission. Leave blank to ignore.',
				'default_value' => '',
				'placeholder' => 'example@mail.com',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_5682b5197709d',
				'label' => 'Twitter',
				'name' => 'byline_twitter',
				'type' => 'text',
				'instructions' => 'Leave blank to ignore.',
				'default_value' => '',
				'placeholder' => 'twitterHandle_123',
				'prepend' => '@',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => 15,
			),
			array (
				'key' => 'field_5682b5c07709e',
				'label' => 'Facebook',
				'name' => 'byline_facebook',
				'type' => 'text',
				'instructions' => 'The part after "facebook.com/" and before any question marks or ampersands. The Plant\'s Facebook group resolves to "groups/482516958582726/" and a random person as "ctkellermann".',
				'default_value' => '',
				'placeholder' => 'groups/groupname or name',
				'prepend' => 'https://www.facebook.com/',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5682b6107709f',
				'label' => 'Website',
				'name' => 'byline_website',
				'type' => 'text',
				'instructions' => 'The author\'s portfolio or other media publisher, not what they endorse. Full URL including "http://".',
				'default_value' => '',
				'placeholder' => 'https://example.com/about.html',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'byline',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'discussion',
				1 => 'comments',
				2 => 'revisions',
				3 => 'featured_image',
				4 => 'categories',
				5 => 'tags',
				6 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
