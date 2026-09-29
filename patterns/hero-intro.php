<?php
/**
 * Title: Hero Intro
 * Slug: alo-blog/hero-intro
 * Categories: alo-blog-intro
 * Description: Simple intro heading with short text for the top of a page.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"primary","textColor":"background","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group has-background-color has-primary-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","level":1,"fontSize":"x-large"} -->
<h1 class="wp-block-heading has-text-align-center has-x-large-font-size"><?php echo esc_html__( 'Write clearly, publish simply.', 'alo-blog' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html__( 'A fast, readable home for your personal writing. No clutter, just words.', 'alo-blog' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
