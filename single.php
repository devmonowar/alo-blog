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
<div class="alo-blog-progress" aria-hidden="true"><span class="alo-blog-progress-bar"></span></div>
<div class="alo-blog-layout">
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
			<p class="alo-blog-meta">
				<?php
				printf(
					/* translators: 1: post date, 2: author link. */
					esc_html__( 'Posted on %1$s by %2$s', 'alo-blog' ),
					'<a href="' . esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ) . '"><time datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time></a>',
					'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
				);
				if ( get_theme_mod( 'aloblog_show_reading_time', true ) ) {
					echo ' <span aria-hidden="true">·</span> ';
					aloblog_the_reading_time();
				}
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
							'before' => '<p class="alo-blog-page-links">' . esc_html__( 'Pages:', 'alo-blog' ),
							'after'  => '</p>',
						)
					);
					?>
				</div>
			<?php the_tags( '<p class="alo-blog-tags"><span class="screen-reader-text">' . esc_html__( 'Tags:', 'alo-blog' ) . '</span> ', ' ', '</p>' ); ?>
			<?php if ( get_theme_mod( 'aloblog_show_author_box', true ) && get_the_author_meta( 'ID' ) ) { ?>
			<div class="alo-blog-author-box">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
				<div class="alo-blog-author-text">
					<p class="alo-blog-author-name"><strong><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></strong></p>
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
			$aloblog_related = aloblog_related_ids( get_the_ID(), 3 );
			if ( ! empty( $aloblog_related ) ) {
				?>
			<section class="alo-blog-related" aria-labelledby="alo-blog-related-heading">
				<h2 id="alo-blog-related-heading"><?php esc_html_e( 'Keep reading', 'alo-blog' ); ?></h2>
				<ul>
					<?php
					foreach ( $aloblog_related as $aloblog_related_id ) {
						$aloblog_related_title = get_the_title( $aloblog_related_id );
						?>
					<li><a href="<?php echo esc_url( get_permalink( $aloblog_related_id ) ); ?>"><?php echo esc_html( $aloblog_related_title ? $aloblog_related_title : __( '(No title)', 'alo-blog' ) ); ?></a></li>
						<?php
					}
					?>
				</ul>
			</section>
				<?php
			}
			?>
			</article>
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
			<?php
		}
		?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
