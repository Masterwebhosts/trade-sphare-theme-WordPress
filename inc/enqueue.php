<?php
/**
 * Trade Sphare - Assets
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * Enqueue theme assets.
 */
function trade_sphare_enqueue_assets() {

    $theme_version = file_exists( TRADE_SPHARE_PATH . '/style.css' )
    ? filemtime( TRADE_SPHARE_PATH . '/style.css' )
    : TRADE_SPHARE_VERSION;

    /*
     * Main stylesheet
     */
    wp_enqueue_style(
        'trade-sphare-style',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );


    /*
     * Main JavaScript
     */
    $main_js = TRADE_SPHARE_PATH . '/assets/js/main.js';

    if ( file_exists( $main_js ) ) {

        wp_enqueue_script(
            'trade-sphare-main',
            TRADE_SPHARE_URI . '/assets/js/main.js',
            array(),
            $theme_version,
            true
        );

    }


    /*
     * Header JavaScript
     */
    $header_js = TRADE_SPHARE_PATH . '/assets/js/header.js';

    if ( file_exists( $header_js ) ) {

        wp_enqueue_script(
            'trade-sphare-header',
            TRADE_SPHARE_URI . '/assets/js/header.js',
            array(),
            $theme_version,
            true
        );

    }


    /*
     * Mobile navigation
     */
    $navigation_js = TRADE_SPHARE_PATH . '/assets/js/navigation.js';

    if ( file_exists( $navigation_js ) ) {

        wp_enqueue_script(
            'trade-sphare-navigation',
            TRADE_SPHARE_URI . '/assets/js/navigation.js',
            array(),
            $theme_version,
            true
        );

    }


    /*
     * Homepage CSS
     */
    if ( is_front_page() ) {

        $home_css = TRADE_SPHARE_PATH . '/assets/css/home.css';

        if ( file_exists( $home_css ) ) {

            wp_enqueue_style(
                'trade-sphare-home',
                TRADE_SPHARE_URI . '/assets/css/home.css',
                array( 'trade-sphare-style' ),
                $theme_version
            );

        }

    }

}

add_action(
    'wp_enqueue_scripts',
    'trade_sphare_enqueue_assets'
);