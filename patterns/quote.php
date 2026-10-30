<?php
/**
 * Title: Quote
 * Slug: alo-blog/quote
 * Categories: alo-blog-intro
 * Description: Large pull quote with the accent style, centered in a full-width section.
 * Viewport Width: 1200
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:quote {"className":"is-style-accent","fontSize":"x-large"} -->
<blockquote class="wp-block-quote is-style-accent has-x-large-font-size"><!-- wp:paragraph -->
<p><?php echo esc_html__( 'Good writing is clear thinking made visible.', 'alo-blog' ); ?></p>
<!-- /wp:paragraph --><cite><?php echo esc_html__( 'A writer’s notebook', 'alo-blog' ); ?></cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:group -->
