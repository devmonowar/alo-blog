<?php
/**
 * Custom search form with label for accessibility.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form role="search" method="get" class="alo-blog-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="alo-blog-search-field"><?php esc_html_e( 'Search', 'alo-blog' ); ?></label>
	<input type="search" id="alo-blog-search-field" class="search-field" placeholder="<?php echo esc_attr__( 'Search…', 'alo-blog' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	<button type="submit"><?php esc_html_e( 'Search', 'alo-blog' ); ?></button>
</form>
