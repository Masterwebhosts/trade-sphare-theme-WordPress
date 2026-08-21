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

        <div class="ts-layout">

            <div class="ts-content-area">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'ts-post' ); ?>>

                            <header class="ts-post-header">

                                <?php
                                $categories = get_the_category();

                                if ( ! empty( $categories ) ) :
                                ?>

                                    <div class="ts-post-category">
                                        <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
                                            <?php echo esc_html( $categories[0]->name ); ?>
                                        </a>
                                    </div>

                                <?php endif; ?>

                                <h1 class="ts-post-title">
                                    <?php the_title(); ?>
                                </h1>

                                <div class="ts-post-meta">

                                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                        <?php echo esc_html( get_the_date() ); ?>
                                    </time>

                                    <span>
                                        <?php
                                        printf(
                                            esc_html__( 'بواسطة %s', 'trade-sphare' ),
                                            esc_html( get_the_author() )
                                        );
                                        ?>
                                    </span>

                                    <span>
                                        <?php
                                        printf(
                                            esc_html__( '%s دقيقة قراءة', 'trade-sphare' ),
                                            esc_html( trade_sphare_get_reading_time() )
                                        );
                                        ?>
                                    </span>

                                </div>

                            </header>

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

                            <div class="ts-post-content">

                                <?php the_content(); ?>

                                <?php
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

                            <!-- Advertiser CTA -->

                            <section class="ts-post-cta ts-post-cta-advertiser">

                                <div class="ts-post-cta-content">

                                    <span class="ts-post-cta-label">
                                        <?php esc_html_e( 'للمعلنين', 'trade-sphare' ); ?>
                                    </span>

                                    <h2>
                                        <?php esc_html_e( 'هل تريد الوصول إلى جمهور مستهدف؟', 'trade-sphare' ); ?>
                                    </h2>

                                    <p>
                                        <?php esc_html_e( 'اعرض إعلانك على Trade Sphare ووصل إلى جمهور مهتم بمنتجاتك وخدماتك.', 'trade-sphare' ); ?>
                                    </p>

                                    <a
                                        class="ts-button"
                                        href="<?php echo esc_url( home_url( '/#advertisers' ) ); ?>"
                                    >
                                        <?php esc_html_e( 'ابدأ الإعلان', 'trade-sphare' ); ?>
                                    </a>

                                </div>

                            </section>

                            <!-- Publisher CTA -->

                            <section class="ts-post-cta ts-post-cta-publisher">

                                <div class="ts-post-cta-content">

                                    <span class="ts-post-cta-label">
                                        <?php esc_html_e( 'للناشرين', 'trade-sphare' ); ?>
                                    </span>

                                    <h2>
                                        <?php esc_html_e( 'هل لديك موقع أو محتوى؟', 'trade-sphare' ); ?>
                                    </h2>

                                    <p>
                                        <?php esc_html_e( 'انضم إلى شبكة الناشرين واستفد من المحتوى والجمهور الذي تبنيه على موقعك.', 'trade-sphare' ); ?>
                                    </p>

                                    <a
                                        class="ts-button"
                                        href="<?php echo esc_url( home_url( '/#publishers' ) ); ?>"
                                    >
                                        <?php esc_html_e( 'انضم كناشر', 'trade-sphare' ); ?>
                                    </a>

                                </div>

                            </section>

                            <!-- Tags -->

                            <?php
                            $tags = get_the_tags();

                            if ( $tags ) :
                            ?>

                                <footer class="ts-post-footer">

                                    <div class="ts-post-tags">

                                        <strong>
                                            <?php esc_html_e( 'الوسوم', 'trade-sphare' ); ?>
                                        </strong>

                                        <div class="ts-post-tag-list">

                                            <?php foreach ( $tags as $tag ) : ?>

                                                <a
                                                    href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
                                                >
                                                    <?php echo esc_html( $tag->name ); ?>
                                                </a>

                                            <?php endforeach; ?>

                                        </div>

                                    </div>

                                </footer>

                            <?php endif; ?>

                            <!-- Author Box -->

                            <section class="ts-author-box">

                                <div class="ts-author-avatar">

                                    <?php
                                    echo get_avatar(
                                        get_the_author_meta( 'ID' ),
                                        80
                                    );
                                    ?>

                                </div>

                                <div class="ts-author-content">

                                    <span class="ts-author-label">
                                        <?php esc_html_e( 'كاتب المقال', 'trade-sphare' ); ?>
                                    </span>

                                    <h3>
                                        <?php echo esc_html( get_the_author() ); ?>
                                    </h3>

                                    <?php
                                    $author_description = get_the_author_meta( 'description' );

                                    if ( $author_description ) :
                                    ?>

                                        <p>
                                            <?php echo esc_html( $author_description ); ?>
                                        </p>

                                    <?php endif; ?>

                                </div>

                            </section>

                            <!-- Related Posts -->

                            <?php
                            $related_posts = new WP_Query(
                                array(
                                    'posts_per_page'      => 3,
                                    'post__not_in'        => array( get_the_ID() ),
                                    'category__in'        => wp_get_post_categories( get_the_ID() ),
                                    'orderby'             => 'rand',
                                    'ignore_sticky_posts' => true,
                                )
                            );

                            if ( $related_posts->have_posts() ) :
                            ?>

                                <section class="ts-related-posts">

                                    <div class="ts-section-heading">

                                        <span class="ts-section-label">
                                            <?php esc_html_e( 'اكتشف المزيد', 'trade-sphare' ); ?>
                                        </span>

                                        <h2 class="ts-related-title">
                                            <?php esc_html_e( 'مقالات ذات صلة', 'trade-sphare' ); ?>
                                        </h2>

                                    </div>

                                    <div class="ts-related-grid">

                                        <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

                                            <article class="ts-related-card">

                                                <?php if ( has_post_thumbnail() ) : ?>

                                                    <a
                                                        class="ts-related-thumbnail"
                                                        href="<?php the_permalink(); ?>"
                                                        aria-label="<?php echo esc_attr( get_the_title() ); ?>"
                                                    >
                                                        <?php
                                                        the_post_thumbnail(
                                                            'medium',
                                                            array(
                                                                'loading' => 'lazy',
                                                            )
                                                        );
                                                        ?>
                                                    </a>

                                                <?php else : ?>

                                                    <a
                                                        class="ts-related-thumbnail ts-related-placeholder"
                                                        href="<?php the_permalink(); ?>"
                                                        aria-label="<?php echo esc_attr( get_the_title() ); ?>"
                                                    >
                                                        <span>
                                                            <?php esc_html_e( 'Trade Sphare', 'trade-sphare' ); ?>
                                                        </span>
                                                    </a>

                                                <?php endif; ?>

                                                <div class="ts-related-content">

                                                    <?php
                                                    $related_categories = get_the_category();

                                                    if ( ! empty( $related_categories ) ) :
                                                    ?>

                                                        <span class="ts-related-category">
                                                            <?php echo esc_html( $related_categories[0]->name ); ?>
                                                        </span>

                                                    <?php endif; ?>

                                                    <h3 class="ts-related-card-title">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>

                                                    <time class="ts-related-date">
                                                        <?php echo esc_html( get_the_date() ); ?>
                                                    </time>

                                                </div>

                                            </article>

                                            <?php
                                            if ( comments_open() || get_comments_number() ) {
                                               comments_template();
                                            }
                                            ?>

                                        <?php endwhile; ?>

                                    </div>

                                </section>

                            <?php
                            endif;

                            wp_reset_postdata();
                            ?>

                            <!-- Post Navigation -->

                            <nav
                                class="ts-post-navigation"
                                aria-label="<?php echo esc_attr__( 'تنقل المقالات', 'trade-sphare' ); ?>"
                            >

                                <div class="ts-post-navigation-previous">

                                    <?php
                                    previous_post_link(
                                        '%link',
                                        '← %title'
                                    );
                                    ?>

                                </div>

                                <div class="ts-post-navigation-next">

                                    <?php
                                    next_post_link(
                                        '%link',
                                        '%title →'
                                    );
                                    ?>

                                </div>

                            </nav>

                        </article>

                    <?php endwhile; ?>

                <?php else : ?>

                    <div class="ts-no-results">

                        <h1>
                            <?php esc_html_e( 'المقال غير موجود', 'trade-sphare' ); ?>
                        </h1>

                        <p>
                            <?php esc_html_e( 'عذرًا، لم نتمكن من العثور على المقال المطلوب.', 'trade-sphare' ); ?>
                        </p>

                    </div>

                <?php endif; ?>

            </div>

            <?php get_sidebar(); ?>

        </div>

    </div>

</main>

<?php
get_footer();
?>
