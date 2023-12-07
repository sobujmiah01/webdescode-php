<?php get_header();?>
    <main class="main_article_post">
        <article class="web_post_wrapper">
        <h2 class="search_heading">Search Result: <?php the_search_query();?></h2>
            <div class="web_post_inner">
            <?php get_template_part('loop_post');?>
            </div>
            <?php get_template_part('custom_pagination');?>
        </article>
        <?php get_sidebar();?>
    </main>
<?php get_footer();?>