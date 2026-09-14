<?php
/**
 * Archive template: category, tag, date, author.
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
		<h1><?php the_archive_title(); ?></h1>
		<?php the_archive_description( '<p class="alo-blog-meta">', '</p>' ); ?>
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
