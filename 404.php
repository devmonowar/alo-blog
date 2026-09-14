<?php
/**
 * 404 template: friendly message + search + home link.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<div class="alo-blog-content">
	<h1><?php esc_html_e( 'Page not found.', 'alo-blog' ); ?></h1>
	<p><?php esc_html_e( 'The page you are looking for does not exist. Try a search or go back home:', 'alo-blog' ); ?></p>
	<?php get_search_form(); ?>
	<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go to Homepage', 'alo-blog' ); ?></a></p>
</div>
<?php
get_footer();
