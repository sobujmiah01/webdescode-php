<?php get_header(); ?>

<main class="main_article_post">
    <article class="web_post_wrapper">
        <div class="web_post_inner">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('single_postWP'); ?>>
                        <h1><?php the_title(); ?></h1>
                        
                        <?php
                            // Include post meta if the template exists
                            if (locate_template('post_meta.php')) {
                                get_template_part('post_meta');
                            } else {
                                echo '<div class="post-meta-default">Default post meta content here.</div>';
                            }
                        ?>

                        <?php the_content(); ?>

                        <!-- Pagination for multi-page content -->
                        <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'webdescode'),
                                'after'  => '</div>',
                            ));
                        ?>

                        <!-- Related Posts Section -->
                        <div class="related_post_wp">
                            <?php
                                // Check if related_post_section.php exists and include it
                                if (locate_template('related_post_section.php')) {
                                    get_template_part('related_post_section');
                                } else {
                                    echo '<div class="related-post-default">Related posts will appear here.</div>';
                                }
                            ?>
                        </div>

                        <!-- Comments Section -->
                        <div class="comment_cstm">
                            <?php comments_template(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p><?php esc_html_e('Nothing, Post here', 'webdescode'); ?></p>
            <?php endif; ?>
        </div>
    </article>

    <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>