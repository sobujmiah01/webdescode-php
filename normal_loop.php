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