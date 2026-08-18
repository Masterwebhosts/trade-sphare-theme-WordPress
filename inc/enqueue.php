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

    $theme_version = TRADE_SPHARE_VERSION;


    wp_enqueue_style(
        'trade-sphare-style',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );


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
