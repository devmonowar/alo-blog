<?php
/**
 * Title: Subscribe Note
 * Slug: alo-blog/subscribe-note
 * Categories: alo-blog-intro
 * Description: Text-only call-to-action note without any form.
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
	<!-- wp:heading {"level":2} -->
	<h2><?php echo esc_html__( 'Follow along', 'alo-blog' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p><?php echo esc_html__( 'New essays arrive by email. No spam, unsubscribe anytime.', 'alo-blog' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
