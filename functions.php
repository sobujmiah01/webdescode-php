<?php

// Enqueue Prism styles and scripts
function enqueue_prism() {
    wp_enqueue_style('prism', get_template_directory_uri() . '/prism/prism.css', array(), '1.1', 'all');
    wp_enqueue_script('prism', get_template_directory_uri() . '/prism/prism.js', array('jquery'), '1.1', true);
}
add_action('wp_enqueue_scripts', 'enqueue_prism');

// Enqueue theme styles, scripts, and Google Fonts
function enqueue_theme_assets() {
    // Enqueue main stylesheet
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/main.css', array(), '1.1', 'all');
    
    // Enqueue custom script
    wp_enqueue_script('app-script', get_template_directory_uri() . '/assets/main.js', array('jquery'), '1.1', true);
    
    // Enqueue Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap',
        array(),
        null
    );
    
    // Enqueue Font Awesome
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/fontawesome/all.min.css', array(), '1.1', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');

// Theme setup for various features
function webdescode_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    
    // Add support for custom logo
    $logo_defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $logo_defaults);
    
    // Register navigation menus
    register_nav_menus(array(
        'header_menu' => __('Header Menu', 'webdescode'),
        'main_menu' => __('Main Menu', 'webdescode'),
        'footer_menu' => __('Footer Menu', 'webdescode'),
    ));
}
add_action('after_setup_theme', 'webdescode_theme_setup');

// Register widget areas
function webdescode_register_widget_areas() {
    $widget_areas = array(
        array(
            'name'          => __('Primary Sidebar', 'webdescode'),
            'id'            => 'sidebar',
            'description'   => __('Widgets added here will appear in the primary sidebar.', 'webdescode'),
            'before_widget' => '<div id="%1$s" class="widget %2$s sider_bar">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title wid_heading">',
            'after_title'   => '</h2>',
        ),
        array(
            'name'          => __('Footer Top Widget', 'webdescode'),
            'id'            => 'footer_top',
            'description'   => __('Widgets added here will appear in the footer top section.', 'webdescode'),
            'before_widget' => '<article id="%1$s" class="widget %2$s footer_top">',
            'after_widget'  => '</article>',
            'before_title'  => '<h2 class="widget-title wid_heading">',
            'after_title'   => '</h2>',
        ),
    );

    foreach ($widget_areas as $widget_area) {
        register_sidebar($widget_area);
    }
}
add_action('widgets_init', 'webdescode_register_widget_areas');

// Modify the excerpt "Read More" link
function new_excerpt_more($more) {
    global $post;
    if (!is_single()) {
        return '<a class="moretag" href="' . esc_url(get_permalink($post->ID)) . '"> Read more...</a>';
    }
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Set custom excerpt length
function custom_excerpt_length($length) {
    return 35; // Set desired length of excerpt in words
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// Related posts function based on categories
function example_cats_related_post($heading = 'Related Posts') {
    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category($post_id);

    if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            array_push($cat_ids, $category->term_id);
        }
    }

    $current_post_type = get_post_type($post_id);

    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
        'posts_per_page'  => '4',
    );

    $related_cats_post = new WP_Query($query_args);

    if ($related_cats_post->have_posts()): ?>
        <div class="related-posts">
            <h3><?php echo esc_html($heading); ?></h3>
            <ul>
                <?php while ($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <figure>
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </figure>
                            <?php the_title(); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php
        wp_reset_postdata();
    endif;
}

// Pagination function
function custom_pagination($pages = '', $range = 4) {
    $showitems = ($range * 2) + 1;
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    if(empty($pages)) {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }

    if(1 != $pages){
        echo '<div class="pagination"><span class="current-page">Page '.$paged.' of '.$pages.'</span><ul class="pagination-list">';

        // Calculate start and end pages based on the clicked page
        $start = max(1, $paged - 2);
        $end = min($paged + 1, $pages);

        // Left arrow
        if($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo '<li class="pagination-item"><a href="'.esc_url(get_pagenum_link(1)).'">&laquo; First</a></li>';
        }

        // Previous arrow
        if($paged > 1 && $showitems < $pages) {
            echo '<li class="pagination-item"><a href="'.esc_url(get_pagenum_link($paged - 1)).'">&lsaquo; Previous</a></li>';
        }

        // Page numbers
        for($i = $start; $i <= $end; $i++){
            if(1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i)? '<li class="pagination-item active"><span class="current-page">'.$i.'</span></li>' : '<li class="pagination-item"><a href="'.esc_url(get_pagenum_link($i)).'" class="inactive">'.$i.'</a></li>';
            }
        }

        // Next arrow
        if($paged < $pages && $showitems < $pages) {
            echo '<li class="pagination-item"><a href="'.esc_url(get_pagenum_link($paged + 1)).'">Next &rsaquo;</a></li>';
        }

        // Last arrow
        if($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
            echo '<li class="pagination-item"><a href="'.esc_url(get_pagenum_link($pages)).'">Last &raquo;</a></li>';
        }

        echo '</ul></div>';
    }
}

// Remove block styles
function custom_remove_block_styles() {
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        
        if (class_exists('WooCommerce')) {
            wp_dequeue_style('wc-block-style');
        }
    }
}
add_action('wp_enqueue_scripts', 'custom_remove_block_styles', 100);

?>