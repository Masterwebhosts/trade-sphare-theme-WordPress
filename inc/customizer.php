<?php
/**
 * Trade Sphare - Customizer
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 * @return void
 */
function trade_sphare_customize_register( $wp_customize ) {

	/*
	 * =====================================================
	 * THEME COLORS
	 * =====================================================
	 */

	$wp_customize->add_section(
		'trade_sphare_colors',
		array(
			'title'       => __( 'Theme Colors', 'trade-sphare' ),
			'description' => __( 'Customize the main colors used throughout the theme.', 'trade-sphare' ),
			'priority'    => 30,
		)
	);

	$wp_customize->add_setting(
		'trade_sphare_primary_color',
		array(
			'default'           => '#2563eb',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'trade_sphare_primary_color',
			array(
				'label'   => __( 'Primary Color', 'trade-sphare' ),
				'section' => 'trade_sphare_colors',
			)
		)
	);

	$wp_customize->add_setting(
		'trade_sphare_primary_hover_color',
		array(
			'default'           => '#1d4ed8',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'trade_sphare_primary_hover_color',
			array(
				'label'   => __( 'Primary Hover Color', 'trade-sphare' ),
				'section' => 'trade_sphare_colors',
			)
		)
	);

	$wp_customize->add_setting(
		'trade_sphare_accent_color',
		array(
			'default'           => '#38bdf8',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'trade_sphare_accent_color',
			array(
				'label'   => __( 'Accent Color', 'trade-sphare' ),
				'section' => 'trade_sphare_colors',
			)
		)
	);

	/*
	 * =====================================================
	 * HOMEPAGE
	 * =====================================================
	 */

	$wp_customize->add_section(
		'trade_sphare_home',
		array(
			'title'       => __( 'Homepage', 'trade-sphare' ),
			'description' => __( 'Customize the content and sections displayed on the homepage.', 'trade-sphare' ),
			'priority'    => 40,
		)
	);

	$wp_customize->add_setting(
		'trade_sphare_hero_title',
		array(
			'default'           => 'Welcome to Your Website',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'trade_sphare_hero_title',
		array(
			'label'       => __( 'Hero Title', 'trade-sphare' ),
			'description' => __( 'Enter the main heading displayed in the homepage hero section.', 'trade-sphare' ),
			'section'     => 'trade_sphare_home',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'trade_sphare_hero_description',
		array(
			'default'           => 'A clean and professional space to share ideas, publish content, and build your online presence.',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'trade_sphare_hero_description',
		array(
			'label'       => __( 'Hero Description', 'trade-sphare' ),
			'description' => __( 'Enter a short description for the homepage hero section.', 'trade-sphare' ),
			'section'     => 'trade_sphare_home',
			'type'        => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'trade_sphare_show_features',
		array(
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'trade_sphare_show_features',
		array(
			'label'       => __( 'Show Features Section', 'trade-sphare' ),
			'description' => __( 'Display the features section on the homepage.', 'trade-sphare' ),
			'section'     => 'trade_sphare_home',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'trade_sphare_show_blog',
		array(
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'trade_sphare_show_blog',
		array(
			'label'       => __( 'Show Blog Section', 'trade-sphare' ),
			'description' => __( 'Display the latest posts section on the homepage.', 'trade-sphare' ),
			'section'     => 'trade_sphare_home',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'trade_sphare_show_cta',
		array(
			'default'           => true,
			'sanitize_callback' => 'wp_validate_boolean',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'trade_sphare_show_cta',
		array(
			'label'       => __( 'Show CTA Section', 'trade-sphare' ),
			'description' => __( 'Display the call-to-action section on the homepage.', 'trade-sphare' ),
			'section'     => 'trade_sphare_home',
			'type'        => 'checkbox',
		)
	);
}

add_action(
	'customize_register',
	'trade_sphare_customize_register'
);

/**
 * Output dynamic Customizer CSS.
 *
 * @return void
 */
function trade_sphare_customizer_css() {

	$primary = get_theme_mod(
		'trade_sphare_primary_color',
		'#2563eb'
	);

	$primary_hover = get_theme_mod(
		'trade_sphare_primary_hover_color',
		'#1d4ed8'
	);

	$accent = get_theme_mod(
		'trade_sphare_accent_color',
		'#38bdf8'
	);

	$primary       = sanitize_hex_color( $primary );
	$primary_hover = sanitize_hex_color( $primary_hover );
	$accent        = sanitize_hex_color( $accent );

	if ( ! $primary ) {
		$primary = '#2563eb';
	}

	if ( ! $primary_hover ) {
		$primary_hover = '#1d4ed8';
	}

	if ( ! $accent ) {
		$accent = '#38bdf8';
	}
	?>

	<style id="trade-sphare-customizer-css">
		:root {
			--ts-primary: <?php echo esc_html( $primary ); ?>;
			--ts-primary-hover: <?php echo esc_html( $primary_hover ); ?>;
			--ts-accent: <?php echo esc_html( $accent ); ?>;
		}
	</style>

	<?php
}

add_action(
	'wp_head',
	'trade_sphare_customizer_css'
);