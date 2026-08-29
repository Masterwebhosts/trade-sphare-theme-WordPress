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

        <div class="ts-footer-main">

            <!-- Brand -->
            <div class="ts-footer-brand">

                <a
                    class="ts-footer-logo"
                    href="<?php echo esc_url( home_url( '/' ) ); ?>"
                    aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                >
                    <?php if ( has_custom_logo() ) : ?>

                        <?php the_custom_logo(); ?>

                    <?php else : ?>

                        <span class="ts-footer-logo-text">
                            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                        </span>

                    <?php endif; ?>
                </a>

                <?php $description = get_bloginfo( 'description' ); ?>

                <?php if ( $description ) : ?>

                    <p class="ts-footer-description">
                        <?php echo esc_html( $description ); ?>
                    </p>

                <?php endif; ?>

                <p class="ts-footer-tagline">
                    <?php
                    esc_html_e(
                        'منصة تربط المعلنين بالناشرين وتساعدك على الوصول إلى جمهورك المستهدف.',
                        'trade-sphare'
                    );
                    ?>
                </p>

            </div>


            <!-- Advertisers -->
            <div class="ts-footer-column">

                <h2 class="ts-footer-heading">
                    <?php esc_html_e( 'للمعلنين', 'trade-sphare' ); ?>
                </h2>

                <?php if ( has_nav_menu( 'footer_advertisers' ) ) : ?>

                    <nav
                        class="ts-footer-nav"
                        aria-label="<?php esc_attr_e( 'روابط المعلنين', 'trade-sphare' ); ?>"
                    >
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer_advertisers',
                                'container'      => false,
                                'menu_class'     => 'ts-footer-menu',
                                'fallback_cb'    => false,
                                'depth'          => 1,
                            )
                        );
                        ?>
                    </nav>

                <?php endif; ?>

            </div>


            <!-- Publishers -->
            <div class="ts-footer-column">

                <h2 class="ts-footer-heading">
                    <?php esc_html_e( 'للناشرين', 'trade-sphare' ); ?>
                </h2>

                <?php if ( has_nav_menu( 'footer_publishers' ) ) : ?>

                    <nav
                        class="ts-footer-nav"
                        aria-label="<?php esc_attr_e( 'روابط الناشرين', 'trade-sphare' ); ?>"
                    >
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer_publishers',
                                'container'      => false,
                                'menu_class'     => 'ts-footer-menu',
                                'fallback_cb'    => false,
                                'depth'          => 1,
                            )
                        );
                        ?>
                    </nav>

                <?php endif; ?>

            </div>


            <!-- Support -->
            <div class="ts-footer-column">

                <h2 class="ts-footer-heading">
                    <?php esc_html_e( 'الدعم', 'trade-sphare' ); ?>
                </h2>

                <?php if ( has_nav_menu( 'footer_support' ) ) : ?>

                    <nav
                        class="ts-footer-nav"
                        aria-label="<?php esc_attr_e( 'روابط الدعم', 'trade-sphare' ); ?>"
                    >
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer_support',
                                'container'      => false,
                                'menu_class'     => 'ts-footer-menu',
                                'fallback_cb'    => false,
                                'depth'          => 1,
                            )
                        );
                        ?>
                    </nav>

                <?php endif; ?>

            </div>

        </div>


        <!-- Footer Bottom -->
        <div class="ts-footer-bottom">

            <div class="ts-footer-copyright">

                <span>
                    &copy;
                    <?php echo esc_html( wp_date( 'Y' ) ); ?>
                    <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                </span>

                <span class="ts-footer-credit">
                    &nbsp;|&nbsp;
                    <a
                        href="https://tradesphare.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Trade Sphare
                    </a>
                </span>

            </div>

            <div class="ts-footer-bottom-links">
                <?php
                /*
                 * Reserved for future utility links.
                 */
                ?>
            </div>

        </div>

    </div>

</footer>