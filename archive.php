<?php
/**
 * Trade Sphare - Archive
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

                <?php the_archive_title( '<h1 class="ts-post-title">', '</h1>' ); ?>

                <?php
                $archive_description = get_the_archive_description();

                if ( $archive_description ) :
                    ?>

                    <div class="ts-post-content">
                        <?php echo wp_kses_post( $archive_description ); ?>
                    </div>

                <?php endif; ?>

            </header>

            <?php if ( have_posts() ) : ?>

                <div class="ts-archive-grid">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <article
                            id="post-<?php the_ID(); ?>"
                            <?php post_class( 'ts-post-card' ); ?>
                        >

                            <?php if ( has_post_thumbnail() ) : ?>

                                <a
                                    class="ts-post-thumbnail"
                                    href="<?php the_permalink(); ?>"
                                    aria-label="<?php echo esc_attr( get_the_title() ); ?>"
                                >

                                    <?php
                                    the_post_thumbnail(
                                        'trade-sphare-card',
                                        array(
                                            'loading' => 'lazy',
                                        )
                                    );
                                    ?>

                                </a>

                            <?php endif; ?>

                            <header class="ts-post-header">

                                <div class="ts-post-meta">

                                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                        <?php echo esc_html( get_the_date() ); ?>
                                    </time>

                                    <?php if ( get_the_author() ) : ?>

                                        <span>
                                            <?php
                                            printf(
                                                esc_html__( ' — بقلم %s', 'trade-sphare' ),
                                                esc_html( get_the_author() )
                                            );
                                            ?>
                                        </span>

                                    <?php endif; ?>

                                </div>

                                <h2 class="ts-post-title">

                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>

                                </h2>

                            </header>

                            <div class="ts-post-content">

                                <?php
                                echo esc_html(
                                    wp_trim_words(
                                        get_the_excerpt(),
                                        22
                                    )
                                );
                                ?>

                            </div>

                            <a
                                class="ts-text-link"
                                href="<?php the_permalink(); ?>"
                                aria-label="<?php echo esc_attr( 'اقرأ: ' . get_the_title() ); ?>"
                            >
                                <?php esc_html_e( 'اقرأ المقال ←', 'trade-sphare' ); ?>
                            </a>

                        </article>

                    <?php endwhile; ?>

                </div>

                <?php
                the_posts_pagination(
                    array(
                        'mid_size'  => 2,
                        'prev_text' => __( '← السابق', 'trade-sphare' ),
                        'next_text' => __( 'التالي →', 'trade-sphare' ),
                        'class'     => 'ts-pagination',
                    )
                );
                ?>

            <?php else : ?>

                <section class="ts-no-results">

                    <h1>
                        <?php esc_html_e( 'لا توجد نتائج', 'trade-sphare' ); ?>
                    </h1>

                    <p>
                        <?php
                        esc_html_e(
                            'لا توجد مقالات متاحة في هذا الأرشيف حاليا.',
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
