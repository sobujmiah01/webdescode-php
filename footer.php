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
                <p>All rights reserved &copy; WebDesCode</p>
                <div class="social_media">
                <?php get_template_part('social_bar');?>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer();?>
</body>
</html>