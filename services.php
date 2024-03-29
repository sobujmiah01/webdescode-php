<?php 
/*
Template Name: Services Page
*/
get_header(); ?>
<main class="main_article_post">
    <article class="web_post_wrapper">
        <div class="web_post_inner">
            <?php
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => -1, // Show all services
            );
            $services_query = new WP_Query($args);
            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <article class="post_wrapper">
                        <figure>
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'thumbnail');?></a>
                        </figure>
                        <div class="article_content">
                            <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                            <?php get_template_part('post_meta');?>
                            <?php the_excerpt();?>
                        </div>
                    </article>
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
