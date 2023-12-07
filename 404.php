<?php get_header(); ?>

<div class="error-404">
    <div class="error-content">
        <h1>Oops! Page not found.</h1>
        <p>Sorry, the page you're looking for might have been removed or doesn't exist.</p>
        <p>Let's get you back on track:</p>
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="search-field" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
            </label>
            <input type="submit" class="search-submit" value="Search" />
        </form>
        <p>You can also navigate back to the <a href="<?php echo esc_url(home_url('/')); ?>">homepage</a>.</p>
    </div>
</div>

<?php get_footer(); ?>