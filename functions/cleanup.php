<?php

// Fire all our initial functions at the start
add_action('after_setup_theme','plant_start', 16);

function plant_start() {
	add_action('init', 'plant_head_cleanup');
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'plant_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action('wp_head', 'plant_remove_recent_comments_style', 1);
	// clean up gallery output in wp
	add_filter('gallery_style', 'plant_gallery_style');
	 // launching this stuff after theme setup
	plant_theme_support();
	 // adding sidebars to Wordpress
	add_action( 'widgets_init', 'plant_register_sidebars' );
	// cleaning up excerpt
	add_filter('excerpt_more', 'plant_excerpt_more');

} /* end plant start */

//The default wordpress head is a mess. Let's clean it up by removing all the junk we don't need.
function plant_head_cleanup() {
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
} /* end plant head cleanup */

// Remove injected CSS for recent comments widget
function plant_remove_wp_widget_recent_comments_style() {
	 if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
		remove_filter('wp_head', 'wp_widget_recent_comments_style' );
	 }
}

// Remove injected CSS from recent comments widget
function plant_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
}

// Remove injected CSS from gallery
function plant_gallery_style($css) {
	return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

// This removes the annoying […] to a Read More link
function plant_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '<a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __('Read', 'plantwp') . get_the_title($post->ID).'">'. __('... Read more &raquo;', 'plantwp') .'</a>';
}

//  Stop WordPress from using the sticky class (which conflicts with Foundation), and style WordPress sticky posts using the .wp-sticky class instead
function remove_sticky_class($classes) {
	if(in_array('sticky', $classes)) {
	$classes = array_diff($classes, array("sticky"));
	$classes[] = 'wp-sticky';
	}
	 return $classes;
}
add_filter('post_class','remove_sticky_class');

//This is a modified the_author_posts_link() which just returns the link. This is necessary to allow usage of the usual l10n process with printf()
function plant_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
	return false;
	$link = sprintf(
	'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
	get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
	esc_attr( sprintf( __( 'Posts by %s', 'plantwp' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
	get_the_author()
	);
	return $link;
}

// Removes width/height attributes from images.
function remove_thumbnail_dimensions($html) {
	$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
	return $html;
}


// Removes ugly .wp-caption classes and wraps captions in neat figcaption elements
function cleaner_caption( $output, $attr, $content ) {
	if ( is_feed() )
		return $output;

	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'caption' => ''
	);

	$attr = shortcode_atts( $defaults, $attr );
	if (empty( $attr['caption'] ) )
		return $content;

	$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';

	$output = '<figure' . $attributes .'>';
	$output .= do_shortcode( $content );
	$output .= '<figcaption class="wp-caption-text">' . $attr['caption'] . '</figcaption>';
	$output .= '</figure>';

	return $output;
}

// Removes default link to image file from images.
function attachment_image_link_remove_filter( $content ) { 
    $content = preg_replace( array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}', '{ wp-image-[0-9]*" /></a>}'), array('<img','" />'), $content ); 
    return $content; 
}

// ADD FILTERS
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); 
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10);  
add_filter('the_content', 'attachment_image_link_remove_filter' );
add_filter('img_caption_shortcode', 'cleaner_caption', 10, 3 );