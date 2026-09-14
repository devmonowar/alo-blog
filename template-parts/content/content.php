<?php
/**
 * Post card for list views (index, archive, search).
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'alo-blog-card' ); ?>>
	<?php
	if ( has_post_thumbnail() ) {
		?>
		<a class="alo-blog-card-thumb" href="<?php echo esc_url( get_permalink() ); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'medium' ); ?>
		</a>
		<?php
	}
	?>
	<?php if ( is_sticky() && ! is_single() ) { ?>
	<p class="alo-blog-sticky-label"><?php esc_html_e( 'Featured', 'alo-blog' ); ?></p>
	<?php } ?>
	<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
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
	<div><?php the_excerpt(); ?></div>
	<p class="alo-blog-read-more">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php esc_html_e( 'Continue reading', 'alo-blog' ); ?><span aria-hidden="true"> &rarr;</span>
		</a>
	</p>
</article>
