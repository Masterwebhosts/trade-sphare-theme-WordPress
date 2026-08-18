<?php
/**
 * Trade Sphare - Theme Setup
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup.
 *
 * @return void
 */
function trade_sphare_theme_setup() {

	/*
	 * Translation.
	 */
	load_theme_textdomain(
		'trade-sphare',
		TRADE_SPHARE_PATH . '/languages'
	);

	/*
	 * WordPress core features.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );

	/*
	 * HTML5 markup.
	 */
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

	/*
	 * Custom image sizes.
	 */
	add_image_size(
		'trade-sphare-card',
		400,
		250,
		true
	);

	/*
	 * Navigation menus.
	 */
	register_nav_menus(
		array(
			'primary'            => __( 'القائمة الرئيسية', 'trade-sphare' ),
			'footer_advertisers' => __( 'Footer - Advertisers', 'trade-sphare' ),
			'footer_publishers'  => __( 'Footer - Publishers', 'trade-sphare' ),
			'footer_support'     => __( 'Footer - Support', 'trade-sphare' ),
		)
	);

	/*
	 * Main sidebar.
	 */
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'trade-sphare' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Widget area for the main sidebar.', 'trade-sphare' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action(
	'after_setup_theme',
	'trade_sphare_theme_setup'
);