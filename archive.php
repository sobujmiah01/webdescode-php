<?php
if (have_posts()) {
    if (get_post_type() == 'services') {
        get_template_part('archive-services');
    } else {
        get_template_part('archive-blog');
    }
}
?>



<?php get_header();?>
    <?php get_template_part('web_slogan');?>
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
                            <article>
                                <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                <?php get_template_part('post_meta');?>
                                <?php the_excerpt();?>
                            </article>
                        </div>
                        <?php endwhile;
                    else:
                        echo'Nothing, Post here';
                    endif;
                ?>
            </div>
        </article>
        <?php get_sidebar();?>
    </main>
<?php get_footer();?>