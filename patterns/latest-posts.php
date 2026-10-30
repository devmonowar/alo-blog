<?php
/**
 * Title: Latest Posts
 * Slug: alo-blog/latest-posts
 * Categories: alo-blog-posts
 * Description: Full-width list of the five latest posts with date, title, excerpt and a divider between items.
 * Viewport Width: 1200
 *
 * @package Alo_Blog
 * @since 1.1.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size"><?php echo esc_html__( 'Latest posts', 'alo-blog' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:query {"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"22%"} -->
<div class="wp-block-column" style="flex-basis:22%"><!-- wp:post-date {"fontSize":"small","textColor":"muted"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"78%"} -->
<div class="wp-block-column" style="flex-basis:78%"><!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->

<!-- wp:post-excerpt {"excerptLength":30,"fontSize":"medium"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
<!-- /wp:separator -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php echo esc_html__( 'No posts yet. Check back soon.', 'alo-blog' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
