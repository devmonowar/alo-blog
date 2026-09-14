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
<!-- wp:quote -->
<blockquote class="wp-block-quote">
	<!-- wp:paragraph -->
	<p><?php echo esc_html__( 'Good writing is clear thinking made visible.', 'alo-blog' ); ?></p>
	<!-- /wp:paragraph -->
</blockquote>
<!-- /wp:quote -->
