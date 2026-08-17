<?php
/**
 * Trade Sphare - Assets
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function trade_sphare_enqueue_assets() {

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style(
        'trade-sphare-style',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );

    wp_enqueue_script(
        'trade-sphare-main',
        TRADE_SPHARE_URI . '/assets/js/main.js',
        array(),
        $theme_version,
        true
    );

    if ( is_front_page() ) {
        wp_enqueue_style(
            'trade-sphare-home',
            TRADE_SPHARE_URI . '/assets/css/home.css',
            array( 'trade-sphare-style' ),
            $theme_version
        );
    }
}

add_action(
    'wp_enqueue_scripts',
    'trade_sphare_enqueue_assets'
);

