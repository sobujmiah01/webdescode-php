<?php
/**
 * Webdescode functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Webdescode
 * @since Webdescode 1.8
 */
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
    wp_enqueue_script('fontawesome-js', get_template_directory_uri() . '/fontawesome/all.min.js', array(), '1.1', true);
    wp_enqueue_script('theme-customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array('jquery', 'customize-preview'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');

/**
 * Enqueue theme styles
 */
function webdescode_enqueue_styles() {
    wp_enqueue_style( 'webdescode-style', get_stylesheet_uri() );

    // Enqueue block styles CSS file
    wp_enqueue_style( 'webdescode-block-styles', get_template_directory_uri() . '/assets/css/block-styles.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'webdescode_enqueue_styles' );

// Include block style registration
require get_template_directory() . '/inc/register_block_style.php';

// Theme setup for various features
function webdescode_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('style-editor.css');
    add_theme_support('wp-block-styles');
    
    // Add support for custom logo
    $logo_defaults = array(
        'height'               => 100,
        'width'                => 200,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $logo_defaults);

    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-color'          => "#ffffff",  // Corrected to include #
        'width'                  => 1200,
        'height'                 => 600,
        'flex-height'            => true,
        'flex-width'             => true,
        'header-text'            => false,
        'default-text-color'     => '000',
        'uploads'                => false,
    ));

    // Add HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // Register navigation menus
    if (function_exists('register_nav_menus')) {
        register_nav_menus(array(
            'header_menu' => __('Header Menu', 'webdescode'),
            'main_menu'   => __('Main Menu', 'webdescode'),
            'footer_menu' => __('Footer Menu', 'webdescode'),
        ));
    }
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

// Function to register customizer settings for social media and website slogan
function webdescode_customize_register( $wp_customize ) {

    // Add Social Media Section
    $wp_customize->add_section('webdescode_social_section', array(
        'title'    => __('Social Media', 'webdescode'),
        'priority' => 30,
    ));

    // Add Social Media Fields
    $social_icons = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter',
        'instagram' => 'Instagram',
        'youtube'   => 'YouTube',
        'linkedin'  => 'LinkedIn',
        'github'    => 'Github',
    );

    foreach ($social_icons as $network => $label) {
        // Add the setting for each social network
        $wp_customize->add_setting('social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        // Add the control to allow the user to input the social media URL
        $wp_customize->add_control('social_' . $network, array(
            'label'    => $label . ' URL',
            'section'  => 'webdescode_social_section',
            'type'     => 'url',
            'priority' => 10,
        ));
    }
}
add_action( 'customize_register', 'webdescode_customize_register' );
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
        'post__not_in'   => array($post_id),
        'posts_per_page' => 2,
    );

    $related_cats_post = new WP_Query($query_args);

    if ($related_cats_post->have_posts()): ?>
        <div class="related-posts">
            <h3><?php echo esc_html($heading); ?></h3>
            <ul>
                <?php while ($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink();?>">
                            <h4><?php the_title(); ?></h4>
                            <?php get_template_part('post_meta');?>
                            <?php the_excerpt(46);?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php
        wp_reset_postdata();
    endif;
}

// Comment reply script enqueued
function webdescode_enqueue_comment_reply_script() {
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'webdescode_enqueue_comment_reply_script');

// Pagination function
function custom_pagination($query = null) {
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }

    $big = 999999999; // A large number for pagination base
    $paged = max(1, get_query_var('paged'));
    $pages = $query->max_num_pages;

    if ($pages > 1) {
        echo '<div class="pagination"><ul class="pagination-list">';

        // Generate pagination links using paginate_links()
        $pagination_links = paginate_links(array(
            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'    => '?paged=%#%',
            'current'   => $paged,
            'total'     => $pages,
            'prev_text' => '&lsaquo; Previous',
            'next_text' => 'Next &rsaquo;',
            'type'      => 'array', // Returns an array of links for custom styling
        ));

        // Filter the pagination links to show only 3 page numbers
        $filtered_links = array();
        foreach ($pagination_links as $link) {
            // Get the page number from the link
            if (preg_match('/href=["\'].*?paged=(\d+)/', $link, $matches)) {
                $page_number = (int) $matches[1];
            } elseif (strpos($link, 'current') !== false) {
                $page_number = $paged; // For the current page
            } else {
                continue;
            }

            // Include only the range of 3 pages
            if ($page_number >= $paged - 1 && $page_number <= $paged + 1) {
                $filtered_links[] = $link;
            }
        }

        // Add navigation arrows (if necessary)
        if ($paged > 1) {
            echo '<li class="pagination-item"><a href="' . esc_url(get_pagenum_link($paged - 1)) . '">&lsaquo; Previous</a></li>';
        }

        // Display the filtered pagination links
        foreach ($filtered_links as $link) {
            if (strpos($link, 'current') !== false) {
                echo '<li class="pagination-item active">' . $link . '</li>';
            } else {
                echo '<li class="pagination-item">' . $link . '</li>';
            }
        }

        if ($paged < $pages) {
            echo '<li class="pagination-item"><a href="' . esc_url(get_pagenum_link($paged + 1)) . '">Next &rsaquo;</a></li>';
        }

        echo '</ul></div>';
    }
}

// Remove block styles
function custom_remove_block_styles() {
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        
        wp_dequeue_style('global-styles');
    }
}
add_action('wp_enqueue_scripts', 'custom_remove_block_styles', 100);

/**
 * Register custom block pattern categories for WebDesCode theme.
 *
 * @since WebDesCode 1.8
 */

// Register block pattern categories.
if ( ! function_exists( 'webdescode_register_block_pattern_categories' ) ) :
    function webdescode_register_block_pattern_categories() {
        // Registering the "Layouts" category.
        register_block_pattern_category(
            'webdescode-layouts',
            array(
                'label'       => __( 'Layouts', 'webdescode' ),
                'description' => __( 'A collection of layout patterns.', 'webdescode' ),
            )
        );
    }
endif;
add_action( 'init', 'webdescode_register_block_pattern_categories' );

// Include the file that registers block patterns.
require get_template_directory() . '/patterns/two-column-layout.php';
