<?php
/**
 * Theme setup: supports, menus, content width, textdomain.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function aloblog_setup() {
	load_theme_textdomain( 'alo-blog', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 64,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );

	add_editor_style( 'assets/css/editor-style.css' );

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'alo-blog' ),
			'footer'  => esc_html__( 'Footer Menu', 'alo-blog' ),
		)
	);

	add_theme_support(
		'starter-content',
		array(
			'posts'   => array(
				'home' => array(
					'post_type'    => 'page',
					'post_title'   => esc_html__( 'Welcome', 'alo-blog' ),
					'post_content' => esc_html__( 'This is a starter page. Replace it with your own words, then set your front page under Settings, Reading.', 'alo-blog' ),
				),
				'about' => array(
					'post_type'    => 'page',
					'post_title'   => esc_html__( 'About', 'alo-blog' ),
					'post_content' => esc_html__( 'Write a few honest lines about who you are and why you write.', 'alo-blog' ),
				),
				'blog'  => array(
					'post_type'    => 'page',
					'post_title'   => esc_html__( 'Writing', 'alo-blog' ),
					'post_content' => esc_html__( 'Your posts will appear here.', 'alo-blog' ),
				),
			),
			'options' => array(
				'show_on_front'  => 'page',
				'page_on_front'  => '{{home}}',
				'page_for_posts' => '{{blog}}',
			),
			'nav_menus' => array(
				'primary' => array(
					'name'  => esc_html__( 'Primary Menu', 'alo-blog' ),
					'items' => array(
						'page_home',
						'page_about',
						'page_blog',
					),
				),
			),
		)
	);
}
add_action( 'after_setup_theme', 'aloblog_setup' );

/**
 * Registers footer widget areas (max 3).
 */
function aloblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'alo-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears on posts and pages with sidebar layout.', 'alo-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	for ( $i = 1; $i <= 3; $i++ ) {
		register_sidebar(
			array(
				/* translators: %d: footer widget area number. */
				'name'          => sprintf( esc_html__( 'Footer %d', 'alo-blog' ), $i ),
				'id'            => 'footer-' . $i,
				'description'   => esc_html__( 'Appears in the footer.', 'alo-blog' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'aloblog_widgets_init' );

/**
 * Registers the theme pattern category.
 */
function aloblog_pattern_categories() {
	register_block_pattern_category(
		'alo-blog-intro',
		array( 'label' => esc_html__( 'Alo Blog', 'alo-blog' ) )
	);
}
add_action( 'init', 'aloblog_pattern_categories' );

/**
 * Registers an Accent block style for quotes.
 */
function aloblog_register_block_styles() {
	register_block_style(
		'core/quote',
		array(
			'name'         => 'accent',
			'label'        => __( 'Accent', 'alo-blog' ),
			'inline_style' => '.wp-block-quote.is-style-accent{border-left-color:var(--alo-blog-primary,#1d4ed8);background:var(--alo-blog-accent-bg,#eef2ff);padding:16px 20px;border-radius:0 8px 8px 0;}',
		)
	);
}
add_action( 'init', 'aloblog_register_block_styles' );

/**
 * Appends an accessible submenu toggle button to parent menu items.
 *
 * Gives keyboard and screen-reader users an explicit control for
 * sub-menus, exposing open/closed state via aria-expanded.
 *
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @param int      $depth       Depth of menu item.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 * @return string Filtered menu item output.
 */
function aloblog_submenu_toggle( $item_output, $item, $depth, $args ) {
	if ( empty( $args->theme_location ) || 'primary' !== $args->theme_location ) {
		return $item_output;
	}
	if ( ! in_array( 'menu-item-has-children', $item->classes, true ) ) {
		return $item_output;
	}
	$item_output .= sprintf(
		'<button class="alo-blog-submenu-toggle" aria-expanded="false" aria-haspopup="true" data-expand="%1$s" data-collapse="%2$s"><span class="screen-reader-text">%1$s</span><span aria-hidden="true">&#x25BE;</span></button>',
		esc_attr__( 'Expand submenu', 'alo-blog' ),
		esc_attr__( 'Collapse submenu', 'alo-blog' )
	);
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'aloblog_submenu_toggle', 10, 4 );

/**
 * Sets the content width in pixels, based on the design system (content 720px).
 */
function aloblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aloblog_content_width', 720 );
}
add_action( 'after_setup_theme', 'aloblog_content_width', 0 );
