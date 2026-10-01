<?php
/**
 * Main template file (blog index fallback).
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<div class="alo-blog-layout">
	<div class="alo-blog-content">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Latest Posts', 'alo-blog' ); ?></h1>
		<?php
		if ( have_posts() ) {
			?>
		<div class="alo-blog-cards<?php echo esc_attr( 'grid' === get_theme_mod( 'aloblog_post_layout', 'list' ) ? ' alo-blog-cards--grid' : '' ); ?>">
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content', get_post_type() );
			}
			?>
		</div>
			<?php
			the_posts_pagination();
		} else {
			get_template_part( 'template-parts/content/content', 'none' );
		}
		?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
