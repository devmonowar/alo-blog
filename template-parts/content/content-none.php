<?php
/**
 * No-results content for empty lists and empty search.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="alo-blog-card">
	<h2><?php esc_html_e( 'Nothing found.', 'alo-blog' ); ?></h2>
	<p><?php esc_html_e( 'Try a different search:', 'alo-blog' ); ?></p>
	<?php get_search_form(); ?>
</div>
