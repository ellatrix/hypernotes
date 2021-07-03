<?php

/*
 * Plugin Name: Hypernotes
 * Plugin URI: https://wordpress.org/plugins/hypernotes/
 * Description: Write private notes within WordPress!
 * Version: 1.0.0
 * Author: Ella van Durpe
 * Author URI: https://ellavandurpe.com
 * License: GPLv2 or later
 * Text Domain: hypernotes
 */

add_action( 'init', function() {
	require 'register.php';
} );

add_filter( 'the_title', function( $title, $id ) {
	if ( get_post_type( $id ) !== 'hypernote' ) {
        return $title;
    }
 
    return get_the_excerpt( $id );
}, 10, 2 );

add_filter( 'wp_insert_post_data', function( $post ) {
	if ( $post['post_type'] == 'hypernote' ) {
		$post[ 'post_status' ] = 'private';
	};

	return $post;
} );

foreach ( array(
	'load-post.php',
	'load-post-new.php',
) as $tag ) {
    add_action( $tag, function() {
		if ( get_current_screen()->post_type !== 'hypernote' ) {
			return;
		}

		remove_editor_styles();
		remove_theme_support( 'editor-color-palette' );
		remove_theme_support( 'editor-font-sizes' );
		remove_theme_support( 'align-wide' );
		remove_theme_support( 'align-full' );
	}, 99999 );
}

add_action( 'admin_menu', function() {
	$terms = get_terms( 'hypernote-folder', array( 'hide_empty' => false ) );
	foreach ( $terms as $term ) {
		add_submenu_page(
			'edit.php?post_type=hypernote',
			'',
			$term->name,
			'read',
			'edit.php?post_type=hypernote&hypernote-folder=' . $term->slug,
			'',
			0
		);
	}
} );
