<?php
/**
 * Trade Sphare - Single Post
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
                                <?php
                                the_post_thumbnail(
                                    'large',
                                    array(
                                        'loading' => 'eager',
                                    )
                                );
                                ?>
                            </div>

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
                                        esc_attr__( 'صفحات المقال', 'trade-sphare' ) .
                                        '">',
                                    'after'  => '</nav>',
                                )
                            );
                            ?>

                        </div>

                        <?php
                        $categories = get_the_category();
                        $tags       = get_the_tags();
                        ?>

                        <?php if ( ! empty( $categories ) || ! empty( $tags ) ) : ?>

                            <footer class="ts-post-footer">

                                <?php if ( ! empty( $categories ) ) : ?>

                                    <div class="ts-post-meta">

                                        <strong>
                                            <?php esc_html_e( 'التصنيفات:', 'trade-sphare' ); ?>
                                        </strong>

                                        <?php foreach ( $categories as $category ) : ?>

                                            <a
                                                href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
                                            >
                                                <?php echo esc_html( $category->name ); ?>
                                            </a>

                                        <?php endforeach; ?>

                                    </div>

                                <?php endif; ?>

                                <?php if ( ! empty( $tags ) ) : ?>

                                    <div class="ts-post-meta">

                                        <strong>
                                            <?php esc_html_e( 'الوسوم:', 'trade-sphare' ); ?>
                                        </strong>

                                        <?php foreach ( $tags as $tag ) : ?>

                                            <a
                                                href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
                                            >
                                                <?php echo esc_html( $tag->name ); ?>
                                            </a>

                                        <?php endforeach; ?>

                                    </div>

                                <?php endif; ?>

                            </footer>

                        <?php endif; ?>

                    </article>

                    <nav
                        class="ts-post-navigation"
                        aria-label="<?php esc_attr_e( 'تنقل المقالات', 'trade-sphare' ); ?>"
                    >

                        <div class="ts-post-navigation-previous">
                            <?php previous_post_link( '%link', '← %title' ); ?>
                        </div>

                        <div class="ts-post-navigation-next">
                            <?php next_post_link( '%link', '%title →' ); ?>
                        </div>

                    </nav>

                <?php endwhile; ?>

            <?php else : ?>

                <div class="ts-no-results">

                    <h1>
                        <?php esc_html_e( 'المقال غير موجود', 'trade-sphare' ); ?>
                    </h1>

                    <p>
                        <?php esc_html_e( 'عذرا لم نتمكن من العثور على المقال المطلوب.', 'trade-sphare' ); ?>
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </div>

</main>

<?php
get_footer();
?>

