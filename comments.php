<?php
/**
 * Trade Sphare - Comments
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( post_password_required() ) {
    return;
}
?>

<section id="comments" class="ts-comments">

    <?php if ( have_comments() ) : ?>

        <h2 class="ts-comments-title">
            <?php
            printf(
                esc_html(
                    _n(
                        '%1$s Comment',
                        '%1$s Comments',
                        get_comments_number(),
                        'trade-sphare'
                    )
                ),
                number_format_i18n( get_comments_number() )
            );
            ?>
        </h2>

        <ol class="ts-comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                )
            );
            ?>
        </ol>

        <?php
        the_comments_pagination(
            array(
                'prev_text' => esc_html__( 'Older Comments', 'trade-sphare' ),
                'next_text' => esc_html__( 'Newer Comments', 'trade-sphare' ),
            )
        );
        ?>

    <?php endif; ?>

    <?php
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="ts-comments-closed">
            <?php esc_html_e( 'Comments are closed.', 'trade-sphare' ); ?>
        </p>
        <?php
    endif;

    comment_form();
    ?>

</section>
