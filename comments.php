<?php
if (have_comments()) : ?>
    <h2 class="comments-title">
        <?php
        printf(
            _n('One Comment', '%1$s Comments', get_comments_number(), 'webdescode'),
            number_format_i18n(get_comments_number())
        );
        ?>
    </h2>

    <ul class="comment-list">
        <?php
        wp_list_comments(array(
            'style'      => 'ul',
            'short_ping' => true,
            'avatar_size' => 64, // Size of the avatar in pixels
        ));
        ?>
    </ul>

    <?php the_comments_navigation(); ?>

<?php
endif;

// If comments are closed and there are comments, leave a note
if (!comments_open() && get_comments_number()) : ?>
    <p class="no-comments"><?php esc_html_e('Comments are closed.', 'webdescode'); ?></p>
<?php
endif;

// Comment form
comment_form();
?>