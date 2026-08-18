<?php
/**
 * Trade Sphare - Page
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

            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <article
                        id="post-<?php the_ID(); ?>"
                        <?php post_class( 'ts-post' ); ?>
                    >

                        <?php if ( has_post_thumbnail() ) : ?>

                            <div class="ts-post-thumbnail">

                                <a
                                    href="<?php the_permalink(); ?>"
                                    aria-label="<?php echo esc_attr( get_the_title() ); ?>"
                                >

                                    <?php
                                    the_post_thumbnail(
                                        'large',
                                        array(
                                            'loading' => 'lazy',
                                        )
                                    );
                                    ?>

                                </a>

                            </div>

                        <?php endif; ?>

                        <header class="ts-post-header">

                            <div class="ts-post-meta">

                                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </time>

                            </div>

                            <h1 class="ts-post-title">
                                <?php the_title(); ?>
                            </h1>

                        </header>

                        <div class="ts-post-content">

                            <?php
                            the_content();

                            wp_link_pages(
                                array(
                                    'before' => '<nav class="ts-pagination" aria-label="' .
                                        esc_attr__( 'صفحات الصفحة', 'trade-sphare' ) .
                                        '">',
                                    'after'  => '</nav>',
                                )
                            );
                            ?>

                        </div>

                    </article>

                <?php endwhile; ?>

            <?php else : ?>

                <section class="ts-no-results">

                    <h1>
                        <?php esc_html_e( 'الصفحة غير موجودة', 'trade-sphare' ); ?>
                    </h1>

                    <p>
                        <?php
                        esc_html_e(
                            'عذرًا، لم نتمكن من العثور على الصفحة المطلوبة.',
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
