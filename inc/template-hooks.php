<?php
/**
 * Trade Sphare - Template Hooks
 *
 * Theme hooks and template-related integrations.
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/* =========================================================
   BODY CLASS
========================================================= */

/**
 * Add Trade Sphare theme classes to the body.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function trade_sphare_body_classes( $classes ) {

    $classes[] = 'trade-sphare-theme';

    if ( is_front_page() ) {
        $classes[] = 'trade-sphare-front-page';
    }

    if ( is_home() ) {
        $classes[] = 'trade-sphare-blog';
    }

    if ( is_singular( 'post' ) ) {
        $classes[] = 'trade-sphare-single-post';
    }

    return $classes;
}

add_filter(
    'body_class',
    'trade_sphare_body_classes'
);


/* =========================================================
   POST CLASS
========================================================= */

/**
 * Add a theme class to posts.
 *
 * @param array $classes Existing post classes.
 * @return array
 */
function trade_sphare_post_classes( $classes ) {

    $classes[] = 'ts-post-entry';

    return $classes;
}

add_filter(
    'post_class',
    'trade_sphare_post_classes'
);

