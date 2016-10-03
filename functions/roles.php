<?php

// Adds the EiC role, with capabilities to use customizer over Editor role
// Custmizer removed, added edit users
$EIC_role = add_role( 'EiC', 'Editor in Chief', array( 
	'read' => true,
	'edit_posts' => true,
	'edit_others_posts' => true,
	'edit_published_posts' => true,
	'edit_pages' => true,
	'publish_posts' => true,
	'publish_pages' => true,
	'edit_published_pages' => true,
	'delete_pages' => true,
	'delete_others_pages' => true,
	'delete_published_pages' => true,
	'delete_posts' => true,
	'delete_others_posts' => true,
	'delete_published_posts' => true,
	'moderate_comments' => true,
	'manage_categories' => true,
	'upload_files' => true,
	'edit_others_pages' => true,
	'delete_users' => true,
	'create_users' => true,
	'list_users' => true,
	'edit_users' => true,
	'edit_comment' => true,
	'manage_options' => true,
	'edit_theme_options' => false,
	'unfiltered_html' => true,
	'level_8' => true ) 
);

$artist_role = add_role( 'Artist', 'Cover Artist', array( 
	'read' => true,
	'edit_posts' => true,
	'edit_others_posts' => true,
	'edit_published_posts' => true,
	'edit_pages' => true,
	'publish_posts' => true,
	'publish_pages' => true,
	'edit_published_pages' => true,
	'upload_files' => true,
	'manage_options' => true,
	'edit_theme_options' => true,
	'level_5' => true ) 
);
remove_role( 'author' );