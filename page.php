<?php
/**
 * Static page template (right sidebar layout).
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
$aloblog_position = get_theme_mod( 'aloblog_sidebar_position', 'right' );
?>
<div class="alo-blog-layout<?php echo esc_attr( ( 'no-sidebar' === $aloblog_position ) ? ' no-sidebar' : '' ); ?>">
	<div class="alo-blog-content">
		<?php
		while ( have_posts() ) {
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1><?php echo esc_html( get_the_title() ); ?></h1>
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
			</article>
			<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
		?>
	</div>
	<?php
	if ( 'no-sidebar' !== $aloblog_position ) {
		get_sidebar();
	}
	?>
</div>
<?php
get_footer();
