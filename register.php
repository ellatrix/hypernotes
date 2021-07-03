<?php

register_post_type( 'hypernote', array(
	'labels' => array(
		'name' => _x( 'Notes', 'Post type general name', 'hypernotes' ),
		'singular_name' => _x( 'Note', 'Post type singular name', 'hypernotes' ),
		'menu_name' => _x( 'Notes', 'Admin Menu text', 'hypernote' ),
		'name_admin_bar' => _x( 'Notes', 'Add New on Toolbar', 'hypernote' ),
		'add_new' => __( 'Add New', 'hypernote' ),
		'add_new_item' => __( 'Add New Note', 'hypernote' ),
		'new_item' => __( 'New Note', 'hypernote' ),
		'edit_item' => __( 'Edit Note', 'hypernote' ),
		'view_item' => __( 'View Note', 'hypernote' ),
		'all_items' => __( 'All Notes', 'hypernote' ),
		'search_items' => __( 'Search Notes', 'hypernote' ),
		'parent_item_colon' => __( 'Parent Notes:', 'hypernote' ),
		'not_found' => __( 'No notes found.', 'hypernote' ),
		'not_found_in_trash' => __( 'No notes found in Trash.', 'hypernote' ),
		'featured_image' => _x( 'Note Cover Image', 'Overrides the â€œFeatured Imageâ€ phrase for this post type. Added in 4.3', 'hypernote' ),
		'set_featured_image' => _x( 'Set cover image', 'Overrides the â€œSet featured imageâ€ phrase for this post type. Added in 4.3', 'hypernote' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the â€œRemove featured imageâ€ phrase for this post type. Added in 4.3', 'hypernote' ),
		'use_featured_image' => _x( 'Use as cover image', 'Overrides the â€œUse as featured imageâ€ phrase for this post type. Added in 4.3', 'hypernote' ),
		'archives' => _x( 'Note archives', 'The post type archive label used in nav menus. Default â€œPost Archivesâ€. Added in 4.4', 'hypernote' ),
		'insert_into_item' => _x( 'Insert into note', 'Overrides the â€œInsert into postâ€/â€Insert into pageâ€ phrase (used when inserting media into a post). Added in 4.4', 'hypernote' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this note', 'Overrides the â€œUploaded to this postâ€/â€Uploaded to this pageâ€ phrase (used when viewing media attached to a post). Added in 4.4', 'hypernote' ),
		'filter_items_list' => _x( 'Filter notes list', 'Screen reader text for the filter links heading on the post type listing screen. Default â€œFilter posts listâ€/â€Filter pages listâ€. Added in 4.4', 'hypernote' ),
		'items_list_navigation' => _x( 'Notes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default â€œPosts list navigationâ€/â€Pages list navigationâ€. Added in 4.4', 'hypernote' ),
		'items_list' => _x( 'Notes list', 'Screen reader text for the items list heading on the post type listing screen. Default â€œPosts listâ€/â€Pages listâ€. Added in 4.4', 'hypernote' )
	),
	'show_ui' => true,
	'supports' => array( 'editor' ),
	'show_in_rest' => true,
	'rewrite' => array( 'slug' => 'hypernote' ),
	'menu_icon' => 'dashicons-format-aside',
) );

register_taxonomy( 'hypernote-folder', 'hypernote', array(
	'hierarchical'      => true,
	'labels'            => array(
		'name'              => _x( 'Folders', 'taxonomy general name', 'hypernotes' ),
		'singular_name'     => _x( 'Folder', 'taxonomy singular name', 'hypernotes' ),
		'search_items'      => __( 'Search Folders', 'hypernotes' ),
		'all_items'         => __( 'All Folders', 'hypernotes' ),
		'parent_item'       => __( 'Parent Folder', 'hypernotes' ),
		'parent_item_colon' => __( 'Parent Folder:', 'hypernotes' ),
		'edit_item'         => __( 'Edit Folder', 'hypernotes' ),
		'update_item'       => __( 'Update Folder', 'hypernotes' ),
		'add_new_item'      => __( 'Add New Folder', 'hypernotes' ),
		'new_item_name'     => __( 'New Folder Name', 'hypernotes' ),
		'menu_name'         => __( 'Manage Folders', 'hypernotes' ),
		'view_item'         => __( 'View Folder', 'hypernotes' ),
		'not_found'         => __( 'No folders found', 'hypernotes' ),
	),
	'public'            => false,
	'show_ui'           => true,
	'show_admin_column' => true,
	'show_in_rest'      => true,
) );
