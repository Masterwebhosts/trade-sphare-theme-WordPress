<?php
/**
 * Trade Sphare - Site Header
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<header class="ts-site-header">
    <div class="ts-container">
        <div class="ts-header-inner">

            <div class="ts-site-branding">

                <?php if ( has_custom_logo() ) : ?>

                    <?php the_custom_logo(); ?>

                <?php else : ?>

                    <a
                        class="ts-site-title"
                        href="<?php echo esc_url( home_url( '/' ) ); ?>"
                    >
                        <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                    </a>

                <?php endif; ?>

            </div>


            <nav
                id="ts-primary-navigation"
                class="ts-navigation"
                aria-label="<?php esc_attr_e( 'القائمة الرئيسية', 'trade-sphare' ); ?>"
            >
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'ts-menu',
                        'fallback_cb'    => false,
                    )
                );
                ?>
            </nav>

            <button
                class="ts-menu-toggle"
                type="button"
                aria-expanded="false"
                aria-controls="ts-primary-navigation"
            >
                <span></span>
                <span></span>
                <span></span>

                <span class="screen-reader-text">
                    <?php esc_html_e( 'فتح القائمة', 'trade-sphare' ); ?>
                </span>
            </button>

        </div>
    </div>
</header>
