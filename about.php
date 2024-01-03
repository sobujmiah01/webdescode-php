<?php 
/*
Template Name: Full box Template
*/
get_header();?>
    <?php get_template_part('web_slogan');?>
    <main class="main_article_post full_page_template">
        <article class="web_post_wrapper">
            <div class="web_post_inner">
                <?php
                    if(have_posts()):
                        while(have_posts()): the_post();?>
                        <div class="post_wrapper">
                            <article>
                                <?php the_content();?>
                            </article>
                        </div>
                        <?php endwhile;
                    else:
                        echo'Nothing, Post here';
                    endif;
                ?>
            </div>
        </article>
    </main>
<?php get_footer();?>