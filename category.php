<?php
if (have_posts()) {
    if (get_post_type() == 'services') {
        get_template_part('category-services');
    }else {
        get_template_part('category-blog');
    }
}
?>