<?php
/**
 * Title: Hero
 * Slug: alo-blog/hero
 * Categories: alo-blog-intro
 * Description: Full-width hero with a large heading, short subtitle and a call-to-action button.
 * Viewport Width: 1200
 *
 * @package Alo_Blog
 * @since 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"primary","textColor":"background","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group alignfull has-background-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php echo esc_html__( 'Write clearly, publish simply.', 'alo-blog' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"><?php echo esc_html__( 'A fast, readable home for your personal writing. No clutter, just words.', 'alo-blog' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","textColor":"primary","style":{"border":{"radius":"6px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-background-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="border-radius:6px"><?php echo esc_html__( 'Start reading', 'alo-blog' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
