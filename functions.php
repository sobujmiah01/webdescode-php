<?php
function enqueue_prism() {
    wp_enqueue_style('prism', get_template_directory_uri() . '/prism/prism.css', '1.0.2', 'all');
    wp_enqueue_script('prism', get_template_directory_uri() . '/prism/prism.js', array('jquery'), '1.0.2', true);
}
add_action('wp_enqueue_scripts', 'enqueue_prism');
/**
 * Enqueue styles and scripts for the theme.
 */
function enqueue_theme_styles_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/main.css', array(), '1.0.2', 'all');
    // Enqueue custom script
    wp_enqueue_script('app-script', get_template_directory_uri() . '/assets/main.js', array('jquery'), '1.0.2', true);
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles_scripts');
/**
 * Enqueue Google Fonts.
 */
function enqueue_google_fonts() {
    // Enqueue Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap',
        array(),
        null
    );    
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');

/**
 * Theme setup for custom logo.
 */
function webdescode_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'webdescode_custom_logo_setup' );
/**
 * Register navigation menus.
 */
function webdescode_register_menus() {
    register_nav_menus(array(
        'header_menu' => __('Header Menu', 'webdescode'),
        'main_menu' => __('Main Menu', 'webdescode'),
        'footer_menu' => __('Footer Menu', 'webdescode'),
    ));
}
add_action('init', 'webdescode_register_menus');
/**
 * Add theme support for post thumbnails.
 */
add_theme_support('post-thumbnails');
// Function to register customizer settings for social media and website slogan
function webdescode_customize_register($wp_customize) {
    // Add Social Media Section
    $wp_customize->add_section('webdescode_social_section', array(
        'title' => __('Social Media', 'webdescode'),
        'priority' => 30,
    ));
    // Add Social Media Fields
    $social_icons = array(
        'facebook' => 'Facebook',
        'twitter' => 'Twitter',
        'instagram' => 'Instagram',
        'youtube' => 'YouTube',
        'linkedin' => 'LinkedIn', // Corrected the spelling
        'github' => 'Github',
    );

    foreach ($social_icons as $network => $label) {
        $wp_customize->add_setting('social_' . $network, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('social_' . $network, array(
            'label' => $label . ' URL',
            'section' => 'webdescode_social_section',
            'type' => 'url',
        ));
    }
}
add_action('customize_register', 'webdescode_customize_register');
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
    global $post;
    return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Setting custom excerpt length
function custom_excerpt_length($length) {
    return 35; // Change this number to the desired length of words
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// Applying custom excerpt length
function apply_custom_excerpt_length() {
    add_filter('excerpt_length', 'custom_excerpt_length');
}
add_action('after_setup_theme', 'apply_custom_excerpt_length');
// Function to register widget areas
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

// Pagination function
function custom_pagination($pages = '', $range = 4){
    $showitems = ($range * 2) + 1;
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    if(empty($pages)) {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages){
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
// Function to create a custom post type 'services'
function create_custom_post_type() {
    register_post_type('services',
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service'),
                'add_new_item' => __('Add New Service'),
                'edit_item' => __('Edit Service'),
                'new_item' => __('New Service'),
                'view_item' => __('View Service'),
                'all_items' => __('All Services'),
                'search_items' => __('Search Services'),
                'not_found' => __('No services found'),
                'not_found_in_trash' => __('No services found in Trash'),
                'parent_item_colon' => __('Parent Service:'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
            'taxonomies' => array('category', 'post_tag'), // Add support for categories and tags
            'rewrite' => array(
                'slug' => 'services', // URL structure customization
                'with_front' => false, // Avoid adding "blog" or "home" in the URL
            ),
            'menu_icon' => 'dashicons-businessperson', // Optional: Adding a custom icon to the admin menu
            'show_in_rest' => true, // Enable Gutenberg editor support
        )
    );
}
add_action('init', 'create_custom_post_type');
// Function to display related posts based on categories
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
        // Restore original Post Data
        wp_reset_postdata();
    endif;
}
function custom_remove_block_styles() {
    if (!is_admin()) { // Ensure this runs only on the front-end
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        
        // Remove WooCommerce block CSS only if WooCommerce is installed
        if (class_exists('WooCommerce')) {
            wp_dequeue_style('wc-block-style');
        }
    }
}
add_action('wp_enqueue_scripts', 'custom_remove_block_styles', 100);
