<?php get_header();?>
    <main class="main_article_post">
        <div class="web_post_wrapper">
            <div class="web_post_inner">
                <?php get_template_part('loop_post');?>
            </div>
            <?php get_template_part('custom_pagination');?>
        </div>
        <?php get_sidebar();?>
    </main>
<?php get_footer();?>