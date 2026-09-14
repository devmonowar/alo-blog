<?php
/**
 * Enqueue scripts and styles the WordPress way.
 *
 * No hardcoded <link> or <script> in templates.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueues front-end styles and scripts.
 */
function aloblog_scripts() {
	$version = ALOBLOG_VERSION;

	wp_enqueue_style( 'aloblog-style', get_stylesheet_uri(), array(), $version );
	wp_enqueue_style( 'aloblog-main', get_template_directory_uri() . '/assets/css/main.css', array( 'aloblog-style' ), $version );
	wp_enqueue_script( 'aloblog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $version, true );

	if ( is_single() ) {
		wp_enqueue_script( 'aloblog-progress', get_template_directory_uri() . '/assets/js/reading-progress.js', array(), $version, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aloblog_scripts' );
