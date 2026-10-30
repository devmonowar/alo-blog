<?php
/**
 * Title: About the Author
 * Slug: alo-blog/about-author
 * Categories: alo-blog-intro
 * Description: Author introduction with a round placeholder avatar, name, short bio and social links.
 * Viewport Width: 1200
 *
 * @package Alo_Blog
 * @since 1.1.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"28%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:28%"><!-- wp:group {"layout":{"type":"constrained","contentSize":"200px"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"radius":"50%"},"dimensions":{"minHeight":"200px"}},"backgroundColor":"primary","textColor":"background","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-background-color has-primary-background-color has-text-color has-background" style="border-radius:50%;min-height:200px"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700"}},"fontSize":"xx-large"} -->
<p class="has-text-align-center has-xx-large-font-size" style="font-weight:700"><?php echo esc_html_x( 'A', 'Initial shown in the author placeholder avatar', 'alo-blog' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"72%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:72%"><!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html__( 'About the author', 'alo-blog' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size"><?php echo esc_html__( 'Hi, I’m Alex Morgan', 'alo-blog' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php echo esc_html__( 'I write about everyday craft, slow technology and the small ideas worth sharing. New essays arrive whenever they are ready, never on a schedule.', 'alo-blog' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"github"} /-->

<!-- wp:social-link {"url":"#","service":"mastodon"} /-->

<!-- wp:social-link {"url":"<?php echo esc_url( get_feed_link() ); ?>","service":"feed"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
