<?php
function enqueue_prism() {
    wp_enqueue_style('prism', get_template_directory_uri() . '/prism/prism.css', '1.0.2', 'all');
    wp_enqueue_script('prism', get_template_directory_uri() . '/prism/prism.js', array(), '1.0.2', true);
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
        'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap'
    );

    // Fallback font included within the same style handle
    wp_style_add_data('google-fonts', 'before', '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>');
    wp_enqueue_style(
        'google-fonts', // Use the same handle as above
        'https://fonts.googleapis.com/css?family=Roboto:400,500,700', // Fallback font
        array(), // No dependency needed for the fallback font
        null // Version number, set to null to prevent conflicts
    );
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');

/**
 * Theme setup for custom logo.
 */
function themename_custom_logo_setup() {
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
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
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
// Registering sidebar widgets
function ourWidgetInit(){
    register_sidebar(array(
        'name' => 'Primary Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="sider_bar">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="wid_heading">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Footer widget',
        'id' => 'footer_top',
        'before_widget' => '<article class="footer_top">',
        'after_widget' => '</article>',
        'before_title' => '<h2 class="wid_heading">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init' , 'ourWidgetInit');
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
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
            'taxonomies' => array('category', 'post_tag'), // Add support for categories and tags
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