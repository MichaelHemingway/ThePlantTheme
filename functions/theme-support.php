<?php

// Adding WP Functions & Theme Support
function plant_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	// Add Menu Support
	add_theme_support('menus');

	// Default thumbnail size
	add_theme_support('post-thumbnails');

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );

	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );

	// Add HTML5 Support
	add_theme_support( 'html5',
	         array(
	         	'comment-list',
	         	'comment-form',
	         	'search-form',
				'gallery',
				'caption'
	         )
	);

	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	if ( ! isset( $content_width ) ) {
		$content_width = 1200; // Default Foundation width
	}

} /* end theme support */

// Adding svg support
function plant_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'plant_mime_types');


function plant_add_image_size() {
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size('large', 932, '', true);
		add_image_size('medium', 250, '', true);
		add_image_size('small', 120, '', true);
		add_image_size('huge', 1200, '', true);
	}
}
add_action( 'after_setup_theme', 'plant_add_image_size', 11 );

// add category nicenames in body and post class
function category_id_class( $classes ) {
	global $post;
	foreach ( ( get_the_category( $post->ID ) ) as $category ) {
		$classes[] = $category->category_nicename;
	}
	return $classes;
}
add_filter( 'post_class', 'category_id_class' );
add_filter( 'body_class', 'category_id_class' );
