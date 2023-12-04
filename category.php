<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php
    $template_file = 'category-blog.php'; // Default template for posts

    if ('services' == get_post_type()) {
        $template_file = 'category-services.php';
    }

    get_template_part($template_file);
    ?>

<?php endwhile; endif; ?>