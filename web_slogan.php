<section class="web_slogan_wrapper">
    <?php 
    $background_image = get_theme_mod('website_slogan_background'); 
    $background_color = get_theme_mod('website_slogan_background_color');
    ?>
    <div class="web_slogan" style="
        background-image: url(<?php echo esc_url($background_image); ?>);
        <?php if ($background_color) echo 'background-color: ' . esc_attr($background_color); ?>
    ">
        <div class="slogan_article">
            <h2><?php echo get_theme_mod('website_slogan_text'); ?></h2>
            <p><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></p>
        </div>
    </div>
</section>