<?php
/**
 * Template tags: reading time and related posts.
 *
 * @package Alo_Blog
 * @since 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Estimates reading time from post content word count.
 *
 * Splits on whitespace so it works for Bengali and other
 * non-Latin scripts too. Minimum one minute.
 *
 * @param int $post_id Post ID. Defaults to the current post.
 * @return int Minutes, at least 1.
 */
function aloblog_reading_time( $post_id = 0 ) {
	$post = get_post( $post_id ? $post_id : get_the_ID() );
	if ( ! $post ) {
		return 1;
	}
	$words = preg_split( '/\s+/u', wp_strip_all_tags( $post->post_content ), -1, PREG_SPLIT_NO_EMPTY );
	$count = is_array( $words ) ? count( $words ) : 0;
	return max( 1, (int) ceil( $count / 200 ) );
}

/**
 * Prints the reading time string for the current post.
 */
function aloblog_the_reading_time() {
	$mins = aloblog_reading_time();
	printf(
		/* translators: %d: estimated reading time in minutes. */
		esc_html( _n( '%d minute read', '%d minutes read', $mins, 'alo-blog' ) ),
		(int) $mins
	);
}

/**
 * Gets related post IDs: same categories first, then tags.
 *
 * @param int $post_id Post ID. Defaults to the current post.
 * @param int $number  Max posts to return.
 * @return int[] Post IDs, newest first, current post excluded.
 */
function aloblog_related_ids( $post_id = 0, $number = 3 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$found   = array();

	$cats = wp_get_post_categories( $post_id, array( 'fields' => 'ids' ) );
	if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
		$q = new WP_Query(
			array(
				'cat'                 => $cats,
				'posts_per_page'      => $number,
				'post__not_in'        => array( $post_id ),
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
				'fields'              => 'ids',
			)
		);
		$found = $q->posts;
		wp_reset_postdata();
	}

	if ( count( $found ) < $number ) {
		$tags = wp_get_post_tags( $post_id, array( 'fields' => 'ids' ) );
		if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) {
			$q = new WP_Query(
				array(
					'tag__in'            => $tags,
					'posts_per_page'    => $number - count( $found ),
					'post__not_in'      => array_merge( array( $post_id ), $found ),
					'ignore_sticky_posts' => true,
					'no_found_rows'     => true,
					'fields'            => 'ids',
				)
			);
			$found = array_merge( $found, $q->posts );
			wp_reset_postdata();
		}
	}

	return array_slice( array_map( 'intval', $found ), 0, $number );
}
