<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="description" content="Discover the latest in web design, development, and SEO strategies. Explore responsive design, UX, content strategy, and stay updated on web development best practices. Your comprehensive resource for all things web solutions and creative design">
    <meta name="keywords" content="website design, development, theme design development, SEO, digital marketing, web development, responsive design, user experience, online presence, content strategy, search engine optimization, social media marketing, e-commerce solutions, mobile-friendly websites, website maintenance, website security, graphic design, branding, online advertising, website analytics, website performance, website optimization, creative web solutions, internet marketing, website usability, website accessibility, website architecture, CMS integration, website hosting, website trends, website best practices, tutorials, coding">
    <meta name="author" content="webdescode">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (is_single() || is_page()) { wp_title('',true); } elseif(is_front_page()) { bloginfo('description'); } else { bloginfo('description'); } ?> | <?php bloginfo('name');?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assis/main.css">
<!--     <script src="assis/jquery.js"></script>
    <script src="assis/main.js"></script> -->
    <?php wp_head();?>
</head>
<body <?php body_class();?>>
    <header>
        <div class="header_top">
            <!-- Top Header Menu -->
            <nav>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header_menu',
                        'container' => 'ul',
                    ));
                ?>
            </nav>
            <div class="social_icon">
            <?php get_template_part('social_bar');?>
            </div>
        </div>
        <div class="Header_main_menu">
            <!-- Main Header Section -->
            <div class="menu_wrapper">
                <div class="logo_menu_wrapper">
                    <a class="web_logoL" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' ); 
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                        echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                        } else {echo '<h1>' . get_bloginfo('name') . '</h1>';}?>
                    </a>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'container' => 'nav',
                        'container_class'=>'main_navigation',
                        /* 'menu_class' => 'main_navigation', */
                    ));
                    ?>
                </div>
                <div class="search_and_rs">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="search_aria">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <input type="search" name="s" id="search" placeholder="search tutorials" value="<?php echo get_search_query(); ?>">
                        </div>
                    </form>
                    <!-- Responsive Menu Icon -->
                    <div class="icon_menu">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>