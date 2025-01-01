<?php get_header(); ?>

<main class="main_article_post">
    <article class="web_post_wrapper">
        <h2 class="search_heading"><?php printf(esc_html__('Search Results for: %s', 'webdescode'), get_search_query()); ?></h2>
        <div class="web_post_inner">
            <?php get_template_part('loop_post'); ?>
        </div>
        <div class="pagination_section">
            <?php custom_pagination(); ?>
        </div>
    </article>
    <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>