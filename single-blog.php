<?php get_header(); ?>
<main class="main_article_post">
    <article class="web_post_wrapper">
        <div class="web_post_inner">
            <?php
                if(have_posts()):
                    while(have_posts()): the_post();
            ?>
                    <div class="post_wrapper single_postWP">
                        <h1><?php the_title();?></h1>
                        <?php
                            // Check if post_meta.php exists
                            if (locate_template('post_meta.php')) {
                                get_template_part('post_meta');
                            } else {
                                echo '<div class="post-meta-default">Default post meta content here.</div>';
                            }
                        ?>
                        <?php the_content(); ?>
                        
                        <!-- Related Post Section -->
                        <div class="related_post_wp">
                            <?php
                                // Check if related_post_section.php exists
                                if (locate_template('related_post_section.php')) {
                                    get_template_part('related_post_section');
                                } else {
                                    echo '<div class="related-post-default">Related posts will appear here.</div>';
                                }
                            ?>
                        </div>
                        
                        <div class="comment_cstm">
                            <?php comments_template(); ?>
                        </div>
                    </div>
            <?php endwhile;
                else:
                    echo'Nothing, Post here';
                endif;
            ?>
        </div>
    </article>
    <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>