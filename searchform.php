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
	<?php $aloblog_search_id = 'alo-blog-search-field-' . wp_unique_id(); ?>
	<label class="screen-reader-text" for="<?php echo esc_attr( $aloblog_search_id ); ?>"><?php esc_html_e( 'Search', 'alo-blog' ); ?></label>
	<input type="search" id="<?php echo esc_attr( $aloblog_search_id ); ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search…', 'alo-blog' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	<button type="submit"><?php esc_html_e( 'Search', 'alo-blog' ); ?></button>
</form>
