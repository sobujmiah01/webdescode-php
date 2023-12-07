<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A website for web development and design tutorials.">
    <meta name="keywords" content="web development, design, tutorials, coding">
    <meta name="author" content="webdescode">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webdescode</title>
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