<?php
/**
 * Trade Sphare - Blog Index
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

        <div class="ts-content-area">

            <header class="ts-post-header">

                <h1 class="ts-post-title">
                    <?php
                    esc_html_e( 'المدونة', 'trade-sphare' );
                    ?>
                </h1>

                <p class="ts-post-content">
                    <?php
                    esc_html_e(
                        'أحدث المقالات والمعلومات المفيدة من Trade Sphare.',
                        'trade-sphare'
                    );
                    ?>
                </p>

            </header>

            <?php if ( have_posts() ) : ?>

                <div class="ts-archive-grid">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                        get_template_part(
                            'template-parts/content/content'
                        );
                        ?>

                    <?php endwhile; ?>

                </div>

                <nav
                    class="ts-pagination"
                    aria-label="<?php esc_attr_e( 'التنقل بين الصفحات', 'trade-sphare' ); ?>"
                >

                    <?php
                    the_posts_pagination(
                        array(
                            'mid_size'  => 2,
                            'prev_text' => __( '← السابق', 'trade-sphare' ),
                            'next_text' => __( 'التالي →', 'trade-sphare' ),
                        )
                    );
                    ?>

                </nav>

            <?php else : ?>

                <section class="ts-no-results">

                    <h2>
                        <?php esc_html_e( 'لا توجد نتائج', 'trade-sphare' ); ?>
                    </h2>

                    <p>
                        <?php
                        esc_html_e(
                            'لم يتم العثور على أي محتوى لعرضه حاليا.',
                            'trade-sphare'
                        );
                        ?>
                    </p>

                </section>

            <?php endif; ?>

        </div>

    </div>

</main>

<?php
get_footer();
?>
