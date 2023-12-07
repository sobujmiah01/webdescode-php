<?php
get_header();
?>
<?php get_template_part('web_slogan');?>
<main class="main_article_post">
    <article class="web_post_wrapper">
        <div class="web_post_inner">
            <?php
            $current_category = get_queried_object();

            $args = array(
                'post_type' => 'services',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category', // Ensure you are using the correct taxonomy
                        'field' => 'term_id',
                        'terms' => $current_category->term_id, // Use the current category ID
                        'include_children' => true, // Include posts from child categories
                    ),
                ),
            );

            $services_query = new WP_Query($args);

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <div class="post_wrapper">
                        <!-- Display posts for the selected category -->
                        <figure>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                        </figure>
                        <article>
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <?php get_template_part('post_meta');?>
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