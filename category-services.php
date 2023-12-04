<?php get_header(); ?>
<main class="main_article_post">
    <article class="web_post_wrapper">
        <div class="web_post_inner">
            <?php
            // Check if a category is selected
            $current_category = get_queried_object();
            if ($current_category && isset($current_category->term_id)) {
                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => -1, // Show all services for the selected category
                    'cat' => $current_category->term_id // Filter by the selected category ID
                );
            } else {
                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => -1, // Show all services if no category is selected
                );
            }

            $services_query = new WP_Query($args);
            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <div class="post_wrapper">
                        <!-- Display posts for the selected category -->
                        <figure>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                        </figure>
                        <div class="post_meta">
                            <span class="post_by">Time: <?php the_time() ?></span>
                            <span class="post_time">Date: <?php the_time('d M Y') ?></span>
                            <span class="post_time"><?php the_category(' , '); ?></span>
                        </div>
                        <article>
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <?php the_excerpt(); ?>
                        </article>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); // Reset post data query
            else :
                echo 'Nothing, Post here';
            endif;
            ?>
        </div>
        <?php get_template_part('custom_pagination'); ?>
    </article>
    <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>