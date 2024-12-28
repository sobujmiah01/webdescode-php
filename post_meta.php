<div class="post-meta">
    <span class="post-author">
        <?php the_author(); ?>
    </span>
    <span class="post-time">
        <?php the_time('m j, Y'); ?>
    </span>
    <span class="post-category">
         <?php the_category(', '); ?>
    </span>
    <?php if (has_tag()) : ?>
        <span class="post-tags">
            <?php the_tags('', ', ', ''); ?>
        </span>
    <?php endif; ?>
</div>