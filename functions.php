<?php 
function enqueue_theme_styles_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assis/main.css', null, true);
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    // Enqueue custom script
    wp_enqueue_script('app-script', get_template_directory_uri() . '/assis/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles_scripts');
/* custom logo function */
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
function webdescode_register_menus() {
    register_nav_menus(array(
        'header_menu' => __('Header Menu', 'webdescode'),
        'main_menu' => __('Main Menu', 'webdescode'),
        'footer_menu' => __('Footer Menu', 'webdescode'),
    ));
}
add_action('init', 'webdescode_register_menus');
add_theme_support('post-thumbnails');
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
// Add Website Slogan Section
$wp_customize->add_section('webdescode_slogan_section', array(
    'title' => __('Website Slogan', 'webdescode'),
    'priority' => 40,
));

// Add Background Image Setting
$wp_customize->add_setting('website_slogan_background', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'website_slogan_background', array(
    'label' => __('Background Image', 'webdescode'),
    'section' => 'webdescode_slogan_section',
    'settings' => 'website_slogan_background',
)));

// Add Background Color Setting
$wp_customize->add_setting('website_slogan_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'website_slogan_background_color', array(
    'label' => __('Background Color', 'webdescode'),
    'section' => 'webdescode_slogan_section',
    'settings' => 'website_slogan_background_color',
)));

// Add Slogan Text Setting
$wp_customize->add_setting('website_slogan_text', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('website_slogan_text', array(
    'label' => __('Slogan Text', 'webdescode'),
    'section' => 'webdescode_slogan_section',
    'type' => 'text',
));
    
}
add_action('customize_register', 'webdescode_customize_register');
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
    global $post;
    return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Set custom excerpt length
function custom_excerpt_length($length) {
    return 50; // Change this number to the desired length of words
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// Apply custom excerpt length
function apply_custom_excerpt_length() {
    add_filter('excerpt_length', 'custom_excerpt_length');
}
add_action('after_setup_theme', 'apply_custom_excerpt_length');
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
function pagination($pages = '', $range = 4){
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
        if($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo '<li class="pagination-item"><a href="'.esc_url(get_pagenum_link(1)).'">&laquo; First</a></li>';
        }
        if($paged > 1 && $showitems < $pages) {
            echo '<li class="pagination-item"><a href="'.esc_url(get_pagenum_link($paged - 1)).'">&lsaquo; Previous</a></li>';
        }
        for($i = 1; $i <= $pages; $i++){
            if(1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i)? '<li class="pagination-item active"><span class="current-page">'.$i.'</span></li>' : '<li class="pagination-item"><a href="'.esc_url(get_pagenum_link($i)).'" class="inactive">'.$i.'</a></li>';
            }
        }
        if($paged < $pages && $showitems < $pages) {
            echo '<li class="pagination-item"><a href="'.esc_url(get_pagenum_link($paged + 1)).'">Next &rsaquo;</a></li>';
        }
        if($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
            echo '<li class="pagination-item"><a href="'.esc_url(get_pagenum_link($pages)).'">Last &raquo;</a></li>';
        }
        echo '</ul></div>';
    }
}
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