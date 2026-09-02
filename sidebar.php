<?php
/**
 * Trade Sphare Sidebar
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<aside
    id="secondary"
    class="ts-sidebar"
    aria-label="<?php esc_attr_e( 'Sidebar', 'trade-sphare' ); ?>"
>

    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

        <?php dynamic_sidebar( 'sidebar-1' ); ?>

    <?php else : ?>

        <section class="widget ts-sidebar-placeholder">

            <h2 class="widget-title">
                <?php esc_html_e( 'Sidebar', 'trade-sphare' ); ?>
            </h2>

            <p>
                <?php esc_html_e( 'Add widgets from the WordPress Customizer.', 'trade-sphare' ); ?>
            </p>

        </section>

    <?php endif; ?>

</aside>