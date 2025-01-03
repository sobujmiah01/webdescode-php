<?php get_header(); ?>

<div class="error-404">
    <div class="error-content">
        <h1><?php esc_html_e('Oops! Page not found.', 'webdescode'); ?></h1>
        <p><?php esc_html_e("We're sorry, but the page you're looking for might have been removed or doesn't exist.", 'webdescode'); ?></p>
        <p><?php esc_html_e("Let's get you back on track:", 'webdescode'); ?></p>
        
        <!-- Search Form -->
        <?php get_search_form(); ?>

        <!-- Call to Action Links -->
        <p>
            <?php esc_html_e('You can also navigate back to the', 'webdescode'); ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php esc_html_e('homepage', 'webdescode'); ?>
            </a> 
            <?php esc_html_e('or check out the following pages:', 'webdescode'); ?>
        </p>
        
        <!-- Suggested Pages -->
        <ul class="suggested-pages">
            <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php esc_html_e('About Us', 'webdescode'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact Us', 'webdescode'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Blog', 'webdescode'); ?></a></li>
        </ul>
    </div>
</div>

<?php get_footer(); ?>