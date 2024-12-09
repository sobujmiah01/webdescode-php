<div class="post-meta">
    <span class="post-time">
        <?php esc_html_e('Published on:', 'webdescode'); ?> <?php the_time('F j, Y'); ?>
    </span>
    
    <span class="post-author">
        <?php esc_html_e('By:', 'webdescode'); ?> <?php the_author(); ?>
    </span>
    
    <span class="post-category">
        <?php esc_html_e('Categories:', 'webdescode'); ?> <?php the_category(', '); ?>
    </span>

    <?php if (has_tag()) : ?>
        <span class="post-tags">
            <?php esc_html_e('Tags:', 'webdescode'); ?> <?php the_tags('', ', ', ''); ?>
        </span>
    <?php endif; ?>
</div>