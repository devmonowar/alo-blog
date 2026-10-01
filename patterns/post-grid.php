<?php
/**
 * Title: Post Grid
 * Slug: alo-blog/post-grid
 * Categories: alo-blog-intro
 * Description: Two-column grid of recent posts with image, title, date and excerpt.
 *
 * @package Alo_Blog
 * @since 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- wp:query {"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":2}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
<!-- wp:post-title {"isLink":true,"fontSize":"large"} /-->
<!-- wp:post-date /-->
<!-- wp:post-excerpt /-->
<!-- /wp:post-template --></div>
<!-- /wp:query -->
