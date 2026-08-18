<?php
/**
 * Trade Sphare - Theme Setup
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function trade_sphare_theme_setup() {

    load_theme_textdomain(
        'trade-sphare',
        TRADE_SPHARE_PATH . '/languages'
    );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'custom-logo' );

    add_theme_support( 'editor-styles' );

    add_editor_style( 'style.css' );

    add_theme_support( 'align-wide' );

    add_theme_support( 'responsive-embeds' );


    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );


    add_image_size(
        'trade-sphare-card',
        400,
        250,
        true
    );


    register_nav_menus(
        array(
            'primary' => __( 'القائمة الرئيسية', 'trade-sphare' ),
            'footer'  => __( 'قائمة التذييل', 'trade-sphare' ),
        )
    );

}

add_action(
    'after_setup_theme',
    'trade_sphare_theme_setup'
);
