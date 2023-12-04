<?php get_header();?>
    <main class="main_article_post">
        <article class="web_post_wrapper">
            <div class="web_post_inner">
                <?php
                    if(have_posts()):
                        while(have_posts()): the_post();?>
                        <div class="post_wrapper">
                            <figure>
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'thumbnail');?></a>
                            </figure>
                            <div class="post_meta">
                                <span class="post_by">Time: <?php the_time()?></span>
                                <span class="post_time">Date: <?php the_time('d M Y')?></span>
                                <span class="post_time"><?php the_category(' , ');?></span>
                            </div>
                            <article>
                                <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                                <?php the_excerpt();?>
                            </article>
                        </div>
                        <?php endwhile;
                    else:
                        echo'Nothing, Post here';
                    endif;
                ?>
            </div>
            <?php get_template_part('custom_pagination');?>
        </article>
        <?php get_sidebar();?>
    </main>
<?php get_footer();?>