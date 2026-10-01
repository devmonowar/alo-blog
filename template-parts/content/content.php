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
	<?php
	$aloblog_raw_title  = get_the_title();
	$aloblog_card_title = $aloblog_raw_title ? wp_strip_all_tags( $aloblog_raw_title ) : __( '(No title)', 'alo-blog' );
	if ( $aloblog_raw_title ) {
		?>
	<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
		<?php
	} else {
		?>
	<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( '(No title)', 'alo-blog' ); ?></a></h2>
		<?php
	}
	?>
	<?php if ( 'post' === get_post_type() ) { ?>
	<p class="alo-blog-meta">
		<?php
		printf(
			/* translators: 1: post date, 2: author link. */
			esc_html__( 'Posted on %1$s by %2$s', 'alo-blog' ),
			'<a href="' . esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ) . '"><time datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time></a>',
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);
		?>
	</p>
	<?php } ?>
	<div><?php the_excerpt(); ?></div>
	<p class="alo-blog-read-more">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php esc_html_e( 'Continue reading', 'alo-blog' ); ?><span class="screen-reader-text"> <?php echo esc_html( $aloblog_card_title ); ?></span><span aria-hidden="true"> &rarr;</span>
		</a>
	</p>
</article>
