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
 */
function trade_sphare_customize_register( $wp_customize ) {

    /*
     * =====================================================
     * BRAND COLORS
     * =====================================================
     */

    $wp_customize->add_section(
        'trade_sphare_colors',
        array(
            'title'       => __( 'Trade Sphare Colors', 'trade-sphare' ),
            'description' => __( 'Customize the main brand colors.', 'trade-sphare' ),
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
            'default'           => '#3b82f6',
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
            'description' => __( 'Customize homepage content.', 'trade-sphare' ),
            'priority'    => 40,
        )
    );


    $wp_customize->add_setting(
        'trade_sphare_hero_title',
        array(
            'default'           => 'منصة تجمع المعلنين والناشرين في مكان واحد',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'trade_sphare_hero_title',
        array(
            'label'   => __( 'Hero Title', 'trade-sphare' ),
            'section' => 'trade_sphare_home',
            'type'    => 'text',
        )
    );


    $wp_customize->add_setting(
        'trade_sphare_hero_description',
        array(
            'default'           => 'Trade Sphare تساعد المعلنين على الوصول إلى جمهور مستهدف، وتمكّن الناشرين من تحقيق الدخل من مواقعهم ومحتواهم.',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );

    $wp_customize->add_control(
        'trade_sphare_hero_description',
        array(
            'label'   => __( 'Hero Description', 'trade-sphare' ),
            'section' => 'trade_sphare_home',
            'type'    => 'textarea',
        )
    );


    $wp_customize->add_setting(
        'trade_sphare_show_features',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'trade_sphare_show_features',
        array(
            'label'   => __( 'Show Features Section', 'trade-sphare' ),
            'section' => 'trade_sphare_home',
            'type'    => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'trade_sphare_show_blog',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'trade_sphare_show_blog',
        array(
            'label'   => __( 'Show Blog Section', 'trade-sphare' ),
            'section' => 'trade_sphare_home',
            'type'    => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'trade_sphare_show_cta',
        array(
            'default'           => true,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );

    $wp_customize->add_control(
        'trade_sphare_show_cta',
        array(
            'label'   => __( 'Show CTA Section', 'trade-sphare' ),
            'section' => 'trade_sphare_home',
            'type'    => 'checkbox',
        )
    );
}

add_action(
    'customize_register',
    'trade_sphare_customize_register'
);


/**
 * Output dynamic Customizer CSS.
 */
function trade_sphare_customizer_css() {

    $primary       = get_theme_mod( 'trade_sphare_primary_color', '#2563eb' );
    $primary_hover = get_theme_mod( 'trade_sphare_primary_hover_color', '#3b82f6' );
    $accent        = get_theme_mod( 'trade_sphare_accent_color', '#38bdf8' );
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
