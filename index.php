<?php

/*
 * Plugin Name: Hypernotes
 * Plugin URI: https://wordpress.org/plugins/hypernotes/
 * Description: Write private notes within WordPress!
 * Version: 1.0.1
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

	$post = get_post( $id );
	$blocks = parse_blocks( $post->post_content );

	$i = 0;
	$text = '';

	while ( isset( $blocks[ $i ] ) ) {
		$text = wp_trim_words( $blocks[ $i ]['innerHTML'], 10 );
		$i++;

		if ( $text ) {
			break;
		}
	}
 
    return $text;
}, 10, 2 );

add_filter( 'wp_insert_post_data', function( $post ) {
	if ( $post['post_type'] == 'hypernote' && $post[ 'post_status' ] !== 'trash' ) {
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
	remove_submenu_page( 'edit.php?post_type=hypernote', 'post-new.php?post_type=hypernote' );
	$terms = get_terms( 'hypernote-folder', array( 'hide_empty' => false ) );
	foreach ( $terms as $term ) {
		add_submenu_page(
			'edit.php?post_type=hypernote',
			'',
			$term->name,
			'read',
			'edit.php?post_type=hypernote&hypernote-folder=' . $term->slug,
			'',
			1
		);
	}
} );

add_filter( 'parent_file', function( $parent_file ) {
    global $submenu_file;

    if (
		isset( $_GET['post_type'] ) &&
		$_GET['post_type'] === 'hypernote' &&
		isset( $_GET['hypernote-folder'] )
	) {
		$submenu_file .= '&hypernote-folder=' . $_GET['hypernote-folder'];
	}

    return $parent_file;
}, 10, 2 );
