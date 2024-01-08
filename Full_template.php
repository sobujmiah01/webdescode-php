<?php 
/*
Template Name: Full Template
*/
get_header();?>
    <main class="main_article_post full_page_template">
        <article class="web_post_wrapper">
            <div class="web_post_inner">
                <?php get_template_part('normal_loop')?>
            </div>
        </article>
    </main>
<?php get_footer();?>