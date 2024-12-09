<?php get_header(); ?>

<main class="main_article_post">
    <article class="web_post_wrapper">
        <div class="web_post_inner pageWp">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <div class="post_wrapper itpage">
                        <article>
                            <?php the_content(); ?>

                            <!-- Pagination for multi-page content -->
                            <?php 
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'webdescode' ),
                                'after'  => '</div>',
                            ) );
                            ?>
                        </article>
                    </div>
                <?php endwhile;
            else :
                echo 'Nothing, Post here';
            endif;
            ?>
        </div>
    </article>
    
    <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>
