<footer>
        <div class="footer_inner">
            <section class="footer_top_wrap">
            <?php dynamic_sidebar('footer_top'); ?>
                <!-- <article class="footer_top">
                    <h3>Popular Categories</h3>
                    <ul>
                        <li><a href="#">Category 1</a></li>
                        <li><a href="#">Category 2</a></li>
                        <li><a href="#">Category 3</a></li>
                        <li><a href="#">Category 4</a></li>
                    </ul>
                </article> -->
            </section>
            <div class="web_credit">
                <p> <a class="footer_credit" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a> All Rights Reserved &copy; <?php echo date('Y'); ?></p>
                <div class="footer_menu">
                    <nav>
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer_menu',
                                'container' => 'ul',
                            ));
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer();?>
</body>
</html>