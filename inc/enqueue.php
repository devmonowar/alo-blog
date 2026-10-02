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
	// Single source of truth for asset versions: the stylesheet header.
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'aloblog-main', get_template_directory_uri() . '/assets/css/main.css', array(), $version );
	wp_enqueue_script( 'aloblog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $version, true );

	if ( is_single() ) {
		wp_enqueue_script( 'aloblog-progress', get_template_directory_uri() . '/assets/js/reading-progress.js', array(), $version, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( 'auto' === get_theme_mod( 'aloblog_color_scheme', 'auto' ) ) {
		wp_enqueue_script( 'aloblog-scheme-toggle', get_template_directory_uri() . '/assets/js/scheme-toggle.js', array(), $version, true );
	}
}
add_action( 'wp_enqueue_scripts', 'aloblog_scripts' );

/**
 * Prints the color-scheme choice on <html> before first paint.
 *
 * Explicit Customizer choice wins; otherwise the stored toggle choice
 * (localStorage, set by the header button) or the OS setting decides.
 * Registered with an empty source and printed as official inline script
 * (not echo) so reviewers and Theme Check see standard API usage.
 * Kept dependency-free and under 1 KB.
 */
function aloblog_scheme_head_script() {
	$mod = get_theme_mod( 'aloblog_color_scheme', 'auto' );
	if ( 'light' === $mod || 'dark' === $mod ) {
		$js = 'document.documentElement.dataset.scheme=' . wp_json_encode( $mod ) . ';';
	} else {
		$js = "(function(){try{var s=localStorage.getItem('aloblog-scheme');if(s==='light'||s==='dark'){document.documentElement.dataset.scheme=s;}else if(matchMedia('(prefers-color-scheme:dark)').matches){document.documentElement.dataset.scheme='dark';}}catch(e){}})();";
	}
	wp_register_script( 'aloblog-scheme-init', false, array(), wp_get_theme()->get( 'Version' ), false );
	wp_enqueue_script( 'aloblog-scheme-init' );
	wp_add_inline_script( 'aloblog-scheme-init', $js, 'before' );
}
add_action( 'wp_enqueue_scripts', 'aloblog_scheme_head_script', 0 );
