<?php

// Theme support options
require_once(get_template_directory().'/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php');

// Add favicon, bylines, custom header and pagination
require_once(get_template_directory().'/functions/modules.php');

// Adds support for multiple languages
require_once(get_template_directory().'/functions/roles.php');

// Remove 4.2 Emoji Support
require_once(get_template_directory().'/functions/disable-emoji.php');

// Adds site styles to the WordPress editor
require_once(get_template_directory().'/functions/editor-styles.php');

// Related post function - no need to rely on plugins
 require_once(get_template_directory().'/functions/related-posts.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Add options page to hold semi-permanent values
require_once(get_template_directory().'/functions/customizer.php');

// Customize the WordPress login menu
require_once(get_template_directory().'/functions/login.php');

// Customize the WordPress admin
require_once(get_template_directory().'/functions/admin.php');

// Add Shortcode support
require_once(get_template_directory().'/functions/shortcodes.php');
