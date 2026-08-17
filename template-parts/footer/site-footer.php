<?php
/**
 * Trade Sphare - Site Footer
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<footer class="ts-site-footer">
    <div class="ts-container">

        <div class="ts-footer-inner">

            <div>
                <div class="ts-footer-title">
                    <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                </div>

                <p class="ts-footer-description">
                    <?php echo esc_html( get_bloginfo( 'description' ) ); ?>
                </p>
            </div>

            <?php if ( has_nav_menu( 'footer' ) ) : ?>

                <nav
                    aria-label="<?php esc_attr_e( 'قائمة التذييل', 'trade-sphare' ); ?>"
                >
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'container'      => false,
                            'menu_class'     => 'ts-footer-menu',
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
                </nav>

            <?php endif; ?>

        </div>

        <div class="ts-footer-bottom">
            &copy;
            <?php echo esc_html( wp_date( 'Y' ) ); ?>
            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
        </div>

    </div>
</footer>

