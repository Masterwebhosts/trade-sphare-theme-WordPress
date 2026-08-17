<?php
/**
 * Trade Sphare - 404 Page
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="ts-site-main">

    <div class="ts-container">

        <section class="ts-no-results ts-404">

            <header class="ts-post-header">

                <p class="ts-home-eyebrow">
                    404
                </p>

                <h1 class="ts-post-title">
                    <?php esc_html_e( 'الصفحة غير موجودة', 'trade-sphare' ); ?>
                </h1>

            </header>

            <div class="ts-post-content">

                <p>
                    <?php
                    esc_html_e(
                        'عذرا الصفحة التي تبحث عنها غير موجودة أو ربما تم نقلها.',
                        'trade-sphare'
                    );
                    ?>
                </p>

            </div>

            <div class="ts-home-actions">

                <a
                    class="ts-button ts-button-primary"
                    href="<?php echo esc_url( home_url( '/' ) ); ?>"
                >
                    <?php esc_html_e( 'العودة إلى الرئيسية', 'trade-sphare' ); ?>
                </a>

                <a
                    class="ts-text-link"
                    href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"
                >
                    <?php esc_html_e( 'تصفح المدونة ←', 'trade-sphare' ); ?>
                </a>

            </div>

        </section>

    </div>

</main>

<?php
get_footer();
?>
