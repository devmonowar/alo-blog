<?php
/**
 * Title: Follow Along
 * Slug: alo-blog/follow-along
 * Categories: alo-blog-intro
 * Description: Centered call-to-action on a soft background with subscribe and browse buttons. No form or plugin required.
 * Viewport Width: 1200
 *
 * @package Alo_Blog
 * @since 1.1.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"surface","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size"><?php echo esc_html__( 'Follow along', 'alo-blog' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"><?php echo esc_html__( 'Fresh essays, no noise. Subscribe by feed and come back anytime.', 'alo-blog' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"background","style":{"border":{"radius":"6px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background-color has-primary-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( get_feed_link() ); ?>" style="border-radius:6px"><?php echo esc_html__( 'Subscribe', 'alo-blog' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","style":{"border":{"radius":"6px"}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-primary-color has-text-color wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="border-radius:6px"><?php echo esc_html__( 'Browse posts', 'alo-blog' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
