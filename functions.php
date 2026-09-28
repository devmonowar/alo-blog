<?php
/**
 * Alo Blog functions and definitions.
 *
 * Setup, enqueue and includes only. Feature logic lives in inc/.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ALOBLOG_VERSION', '1.0.2' );

require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/customizer.php';
