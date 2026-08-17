<?php
/**
 * Trade Sphare Post Content
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'ts-post-card' ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>

        <a
            class="ts-post-thumbnail"
            href="<?php the_permalink(); ?>"
            aria-label="<?php echo esc_attr( 'اقرأ: ' . get_the_title() ); ?>"
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
                        esc_html__( 'بواسطة %s', 'trade-sphare' ),
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

    <?php if ( has_excerpt() ) : ?>

        <div class="ts-post-excerpt">
            <?php the_excerpt(); ?>
        </div>

    <?php else : ?>

        <div class="ts-post-excerpt">
            <?php
            echo esc_html(
                wp_trim_words(
                    wp_strip_all_tags( get_the_content() ),
                    30
                )
            );
            ?>
        </div>

    <?php endif; ?>

    <footer class="ts-post-footer">

        <a
            class="ts-read-more"
            href="<?php the_permalink(); ?>"
            aria-label="<?php echo esc_attr( 'اقرأ: ' . get_the_title() ); ?>"
        >
            <?php esc_html_e( 'اقرأ المقال ←', 'trade-sphare' ); ?>
        </a>

    </footer>

</article>
