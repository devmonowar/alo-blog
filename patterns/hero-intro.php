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
<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group">
	<!-- wp:heading {"level":1} -->
	<h1><?php echo esc_html__( 'Write clearly, publish simply.', 'alo-blog' ); ?></h1>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p><?php echo esc_html__( 'A fast, readable home for your personal writing. No clutter, just words.', 'alo-blog' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
