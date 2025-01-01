<?php
// About Layout Pattern.
if ( ! function_exists( 'webdescode_register_about_layout_pattern' ) ) :
    function webdescode_register_about_layout_pattern() {
        register_block_pattern(
            'webdescode/about-layout',
            array(
                'title'       => __( 'About Layout', 'webdescode' ),
                'description' => __( 'An about section layout with heading and paragraph.', 'webdescode' ),
                'categories'  => array( 'webdescode-layouts' ),
                'content'     => '<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>Welcome to WebDesCode, your ultimate destination for web design, development, SEO expertise, and more. Our mission is simple: to empower web designers, developers, SEO experts, and anyone in related fields by providing valuable insights, resources, and tutorials. Additionally, our platform is designed to meet the requirements for Google AdSense Apply, ensuring content quality and compliance for seamless monetization.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading -->
<h2 class="wp-block-heading">About the Author</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Hi, I’m <strong>Sobuj Miah</strong>, the author and creator of WebDesCode. With a deep passion for technology and years of experience in web design, development, and digital marketing, I started this blog to share knowledge and build a community of like-minded professionals. My journey spans across platforms like <strong>YouTube</strong>, <strong>Upwork</strong>, <strong>Fiverr</strong>, <strong>Freelancer</strong>, and <strong>PeoplePerHour</strong>, where I’ve honed my skills and gained invaluable experience.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"id":15,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost/project/wp-content/uploads/2024/12/Md-Sobuj-Miah.jpg" alt="Sobuj Miah" class="wp-image-15"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
            )
        );
    }
endif;
add_action( 'init', 'webdescode_register_about_layout_pattern' );
