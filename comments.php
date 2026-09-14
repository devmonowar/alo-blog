<?php
/**
 * Comments template: list, form, closed/empty/password states.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	?>
	<p><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'alo-blog' ); ?></p>
	<?php
	return;
}
?>

<div id="comments" class="alo-blog-comments">
	<?php if ( have_comments() ) { ?>
		<h2>
			<?php
			printf(
				/* translators: %s: number of comments. */
				esc_html( _nx( '%s comment', '%s comments', get_comments_number(), 'comments title', 'alo-blog' ) ),
				esc_html( number_format_i18n( get_comments_number() ) )
			);
			?>
		</h2>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php } ?>

	<?php
	if ( ! comments_open() && get_comments_number() ) {
		?>
		<p><?php esc_html_e( 'Comments are closed.', 'alo-blog' ); ?></p>
		<?php
	}

	comment_form();
	?>
</div>
