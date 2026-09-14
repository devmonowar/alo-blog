<?php
/**
 * Single post template.
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
		while ( have_posts() ) {
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1><?php echo esc_html( get_the_title() ); ?></h1>
				<p class="alo-blog-meta">
					<?php
					printf(
						/* translators: 1: post date, 2: author name. */
						esc_html__( 'Posted on %1$s by %2$s', 'alo-blog' ),
						esc_html( get_the_date() ),
						esc_html( get_the_author() )
					);
					?>
				</p>
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
							'before' => '<p>' . esc_html__( 'Pages:', 'alo-blog' ),
							'after'  => '</p>',
						)
					);
					?>
				</div>
			<?php the_tags( '<p class="alo-blog-tags">', ' ', '</p>' ); ?>
			<?php if ( get_theme_mod( 'aloblog_show_author_box', true ) && get_the_author_meta( 'ID' ) ) { ?>
			<div class="alo-blog-author-box">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
				<div class="alo-blog-author-text">
					<p class="alo-blog-author-name"><strong><?php echo esc_html( get_the_author() ); ?></strong></p>
					<?php
					$aloblog_author_bio = get_the_author_meta( 'description' );
					if ( $aloblog_author_bio ) {
						?>
						<p class="alo-blog-author-bio"><?php echo esc_html( $aloblog_author_bio ); ?></p>
						<?php
					}
					?>
				</div>
			</div>
			<?php } ?>
				<?php
				the_post_navigation(
					array(
						/* translators: %s: neighboring post title. */
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'alo-blog' ) . '</span> <span class="nav-title">%title</span>',
						/* translators: %s: neighboring post title. */
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'alo-blog' ) . '</span> <span class="nav-title">%title</span>',
					)
				);
				?>
				<?php comments_template(); ?>
			</article>
			<?php
		}
		?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
