<?php
/**
 * Title: Quote
 * Slug: alo-blog/quote
 * Categories: alo-blog-intro
 * Description: Simple pull quote for articles.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- wp:quote {"className":"is-style-accent"} -->
<blockquote class="wp-block-quote is-style-accent"><!-- wp:paragraph -->
<p><?php echo esc_html__( 'Good writing is clear thinking made visible.', 'alo-blog' ); ?></p>
<!-- /wp:paragraph --><cite><?php echo esc_html__( 'A writer’s notebook', 'alo-blog' ); ?></cite></blockquote>
<!-- /wp:quote -->
