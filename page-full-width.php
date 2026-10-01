<?php
/**
 * Template Name: Full Width
 * Template Post Type: page
 *
 * Full-width page template: content without sidebar.
 *
 * @package Alo_Blog
 * @since 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<div class="alo-blog-layout no-sidebar">
	<div class="alo-blog-content">
		<?php
		while ( have_posts() ) {
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
				if ( get_the_title() ) {
					the_title( '<h1>', '</h1>' );
				} else {
					echo '<h1>' . esc_html__( '(No title)', 'alo-blog' ) . '</h1>';
				}
				?>
				<?php
				if ( has_post_thumbnail() ) {
					?>
					<figure class="alo-blog-featured">
						<?php the_post_thumbnail( 'large' ); ?>
					</figure>
					<?php
				}
				?>
				<div class="alo-blog-entry-content">
					<?php
					the_content();
					wp_link_pages(
						array(
							'before' => '<p class="alo-blog-page-links">' . esc_html__( 'Pages:', 'alo-blog' ),
							'after'  => '</p>',
						)
					);
					?>
				</div>
			</article>
			<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
		?>
	</div>
</div>
<?php
get_footer();
