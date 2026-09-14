<?php
/**
 * Customizer: max 4 simple options, every setting has sanitize_callback.
 *
 * 1. Footer credit text  2. Sidebar position  3. Excerpt length  4. Author box.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers Theme Options section and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function aloblog_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'aloblog_options',
		array(
			'title'       => esc_html__( 'Theme Options', 'alo-blog' ),
			'priority'    => 120,
			'capability'  => 'edit_theme_options',
			'description' => esc_html__( 'Simple display options for Alo Blog.', 'alo-blog' ),
		)
	);

	$wp_customize->add_setting(
		'aloblog_footer_credit',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'aloblog_footer_credit',
		array(
			'label'   => esc_html__( 'Footer credit text', 'alo-blog' ),
			'section' => 'aloblog_options',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'aloblog_sidebar_position',
		array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'aloblog_sanitize_sidebar_position',
		)
	);
	$wp_customize->add_control(
		'aloblog_sidebar_position',
		array(
			'label'   => esc_html__( 'Page sidebar position', 'alo-blog' ),
			'section' => 'aloblog_options',
			'type'    => 'select',
			'choices' => array(
				'right'      => esc_html__( 'Right sidebar', 'alo-blog' ),
				'no-sidebar' => esc_html__( 'No sidebar', 'alo-blog' ),
			),
		)
	);

	$wp_customize->add_setting(
		'aloblog_excerpt_length',
		array(
			'default'           => 40,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'aloblog_excerpt_length',
		array(
			'label'       => esc_html__( 'Excerpt length (words)', 'alo-blog' ),
			'section'     => 'aloblog_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 1,
			),
		)
	);

	$wp_customize->add_setting(
		'aloblog_show_author_box',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'aloblog_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'aloblog_show_author_box',
		array(
			'label'   => esc_html__( 'Show author box on single posts', 'alo-blog' ),
			'section' => 'aloblog_options',
			'type'    => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'aloblog_customize_register' );

/**
 * Sanitizes sidebar position against whitelist.
 *
 * @param string $value Raw value.
 * @return string Sanitized value.
 */
function aloblog_sanitize_sidebar_position( $value ) {
	$allowed = array( 'right', 'no-sidebar' );
	if ( ! in_array( $value, $allowed, true ) ) {
		return 'right';
	}
	return $value;
}

/**
 * Sanitizes checkbox to boolean.
 *
 * @param mixed $value Raw value.
 * @return bool Sanitized value.
 */
function aloblog_sanitize_checkbox( $value ) {
	return (bool) $value;
}

/**
 * Applies the excerpt length option.
 *
 * @param int $length Default length.
 * @return int Filtered length.
 */
function aloblog_excerpt_length( $length ) {
	$custom = absint( get_theme_mod( 'aloblog_excerpt_length', 40 ) );
	if ( $custom >= 10 && $custom <= 100 ) {
		return $custom;
	}
	return $length;
}
add_filter( 'excerpt_length', 'aloblog_excerpt_length' );
