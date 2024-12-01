<?php
if (have_posts()) {
    $post_type = get_post_type();
    switch ($post_type) {
        case 'services':
            get_template_part('single-services');
            break;
        case 'post':
        default:
            get_template_part('single-blog');
            break;
    }
}
?>