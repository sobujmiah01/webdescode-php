<!-- 
    Template Name: Template1
 -->
<?php get_header();?>
    <section class="web_slogan_wrapper">
        <article class="web_slogan">
            <h2>Website</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam sapiente quaerat nemo, quam quos facere
                aperiam doloremque placeat consectetur provident!</p>
        </article>
    </section>
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
                            </div>
                            <article>
                                <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                <?php the_excerpt();?>
                            </article>
                        </div>
                        <?php endwhile;
                    else:
                        echo'Nothing, Post here';
                    endif;
                ?>
<!--                 <div class="post_wrapper">
                    <figure>
                        <img src="assis/images/hands-8297611-min.jpg" alt="Description of the image">
                    </figure>
                    <div class="post_meta">
                        <span class="post_by">Time: 10pm</span>
                        <span class="post_time">Date: 20/20/2023</span>
                    </div>
                    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem dicta omnis quibusdam vitae, harum
                        dolorum dolor facilis libero sequi excepturi illo ad distinctio qui doloribus, sed quo nostrum,
                        provident doloremque perferendis perspiciatis cupiditate...</p>
                </div> -->
            </div>
        </article>
        <aside>
            <div class="sider_bar">
                <h3>Recent Posts</h3>
                <ul>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                </ul>
            </div>
            <div class="sider_bar">
                <h3>Recent Posts</h3>
                <ul>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                </ul>
            </div>
            <div class="sider_bar">
                <h3>Recent Posts</h3>
                <ul>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                </ul>
            </div>
            <div class="sider_bar">
                <h3>Recent Posts</h3>
                <ul>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                </ul>
            </div>
            <div class="sider_bar">
                <h3>Recent Posts</h3>
                <ul>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                </ul>
            </div>
            <div class="sider_bar">
                <h3>Recent Posts</h3>
                <ul>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                    <li><a href="#">Post New Here</a></li>
                </ul>
            </div>
        </aside>
    </main>
<?php get_footer();?>