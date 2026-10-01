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
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"width":"2px","radius":"8px"}},"borderColor":"primary","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group has-border-color has-primary-border-color" style="border-width:2px;border-radius:8px"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Follow along', 'alo-blog' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html__( 'Fresh essays, no noise. Come back anytime.', 'alo-blog' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
