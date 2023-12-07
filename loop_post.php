<?php
    if(have_posts()):
        while(have_posts()): the_post();?>
        <div class="post_wrapper">
            <figure>
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'thumbnail');?></a>
            </figure>
            <article>
                <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                <?php get_template_part('post_meta');?>
                <?php the_excerpt();?>
            </article>
        </div>
        <?php endwhile;
    else:
        echo'Nothing, Post here';
    endif;
?>