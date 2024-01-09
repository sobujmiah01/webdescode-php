<?php get_header();?>
    <main class="main_article_post">
        <article class="web_post_wrapper">
            <div class="web_post_inner">
                <?php
                    if(have_posts()):
                        while(have_posts()): the_post();?>
                        <div class="post_wrapper single_postWP">
                            <article>
                                <h1><?php the_title();?></h1>
                                <?php get_template_part('post_meta');?>
                                <?php the_content();?>
                            </article>
                        </div>
                        <?php endwhile;
                    else:
                        echo'Nothing, Post here sss';
                    endif;
                ?>
            </div>
        </article>
        <?php get_sidebar();?>
    </main>
<?php get_footer();?>