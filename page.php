<?php get_header();?>
    <main class="main_article_post">
        <article class="web_post_wrapper">
            <div class="web_post_inner">
                <?php get_template_part('normal_loop')?>
            </div>
        </article>
        <?php get_sidebar();?>
    </main>
<?php get_footer();?>