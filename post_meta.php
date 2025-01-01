<div class="post-meta">
    <!-- Post Author -->
    <span class="post-author">
        <?php the_author(); ?>
    </span>
    
    <!-- Post Time -->
    <span class="post-time">
        <?php the_time('F j, Y'); ?>
    </span>
    
    <!-- Post Category -->
    <span class="post-category">
        <?php the_category(', '); ?>
    </span>
    
    <!-- Post Tags -->
    <?php if (has_tag()): ?>
        <span class="post-tags">
            <?php the_tags('', ', ', ''); ?>
        </span>
    <?php endif; ?>
</div>