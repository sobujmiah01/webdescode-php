<?php if (have_comments()): ?>
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
<?php endif; ?>

<?php if (!comments_open() && get_comments_number()): ?>
    <p class="no-comments"><?php esc_html_e('Comments are closed.', 'webdescode'); ?></p>
<?php endif; ?>

<?php
// Comment form
$commenter = wp_get_current_commenter(); // Get current commenter information
$req = get_option('require_name_email'); // Check if name and email are required
$aria_req = $req ? 'aria-required="true"' : ''; // Define aria-required attribute

comment_form(array(
    'fields' => array(
        'author' => '<p class="comment-form-author"><label for="author">' . __('Name', 'webdescode') . '</label>' .
            ($req ? '<span class="required">*</span>' : '') .
            '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" ' . $aria_req . ' /></p>',
        'email'  => '<p class="comment-form-email"><label for="email">' . __('Email', 'webdescode') . '</label>' .
            ($req ? '<span class="required">*</span>' : '') .
            '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" ' . $aria_req . ' /></p>',
    ),
    'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __('Comment', 'webdescode') . '</label>' .
        '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
    'comment_notes_before' => '<p class="comment-notes">' . __('Your email address will not be published.', 'webdescode') . '</p>',
    'comment_notes_after' => '',
    'title_reply' => __('Leave a Comment', 'webdescode'),
    'label_submit' => __('Post Comment', 'webdescode'),
));
?>