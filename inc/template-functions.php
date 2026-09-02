<?php
/**
 * Trade Sphare - Template Functions
 *
 * Helper functions used by theme templates.
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* =========================================================
   POST EXCERPT
========================================================= */

/**
 * Return a clean post excerpt with a configurable word limit.
 *
 * @param int      $length  Number of words.
 * @param int|null $post_id Post ID.
 * @return string
 */
function trade_sphare_get_excerpt( $length = 30, $post_id = null ) {

	$post_id = $post_id ?: get_the_ID();

	if ( ! $post_id ) {
		return '';
	}

	$excerpt = get_the_excerpt( $post_id );

	if ( empty( $excerpt ) ) {
		$content = get_post_field(
			'post_content',
			$post_id
		);

		$content = strip_shortcodes( $content );

		$excerpt = wp_strip_all_tags( $content );
	}

	return wp_trim_words(
		wp_strip_all_tags( $excerpt ),
		absint( $length )
	);
}

/* =========================================================
   POST CATEGORY
========================================================= */

/**
 * Return the first post category.
 *
 * @param int|null $post_id Post ID.
 * @return WP_Term|null
 */
function trade_sphare_get_primary_category( $post_id = null ) {

	$post_id = $post_id ?: get_the_ID();

	if ( ! $post_id ) {
		return null;
	}

	$categories = get_the_category( $post_id );

	if ( empty( $categories ) ) {
		return null;
	}

	return $categories[0];
}

/* =========================================================
   POST READING TIME
========================================================= */

/**
 * Estimate post reading time.
 *
 * Supports Unicode letters and numbers.
 *
 * @param int|null $post_id Post ID.
 * @return int
 */
function trade_sphare_get_reading_time( $post_id = null ) {

	$post_id = $post_id ?: get_the_ID();

	if ( ! $post_id ) {
		return 1;
	}

	$content = get_post_field(
		'post_content',
		$post_id
	);

	$content = strip_shortcodes( $content );
	$content = wp_strip_all_tags( $content );

	preg_match_all(
		'/[\p{L}\p{N}]+/u',
		$content,
		$matches
	);

	$word_count = count( $matches[0] );

	/*
	 * Approximate reading speed:
	 * 200 words per minute.
	 */
	$minutes = (int) ceil(
		$word_count / 200
	);

	return max( 1, $minutes );
}