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
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content', get_post_type() );
			}
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
