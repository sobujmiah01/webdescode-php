<?php get_header();?>
    <main class="main_article_post">
        <div class="web_post_wrapper">
            <div class="web_post_inner">
                <?php get_template_part('loop_post');?>
            </div>
            <div class="pagination_section">
                <?php custom_pagination()?>   
            </div>
        </div>
        <?php get_sidebar();?>
    </main>
<?php get_footer();?>