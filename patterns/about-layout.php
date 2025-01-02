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
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading -->
<h2 class="wp-block-heading">Who We Are</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>WebDesCode is more than just a blog—it’s a thriving community powered by a dedicated team of over <strong>20 professionals</strong>, including a responsive support team. Together, we work tirelessly to create valuable content, tutorials, and insights to help you achieve your goals.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>In addition to this blog, our successful YouTube channel, WebDesCode, features video tutorials, tips, and expert advice to complement our written content.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading -->
<h2 class="wp-block-heading">Our Experience</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our journey is backed by years of practical experience in the industry. Whether you’re a beginner or an expert, you’ll find something valuable here to sharpen your skills and stay ahead in the dynamic fields of web design and SEO</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading -->
<h2 class="wp-block-heading">Why Choose Us?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>At WebDesCode, we believe in continuous learning and growth. Our blog is designed to help you further enhance your skills, whether you’re looking to master the latest web design trends, optimize your SEO strategy, or refine your development expertise. We’re here to guide you every step of the way.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading -->
<h2 class="wp-block-heading">Get Involved</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We’d love for you to be a part of our journey! Here’s how you can get involved:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li>Subscribe to our blog for the latest posts and updates.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Watch and subscribe to our YouTube channel <a href="https://www.youtube.com/@webdescode" data-type="link" data-id="https://www.youtube.com/@webdescode" target="_blank" rel="noreferrer noopener">webdescode</a>.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Share your feedback or ask questions—our support team is here to help.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Explore our resources and start enhancing your skills today!</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>Thank you for choosing WebDesCode. Together, let’s learn, grow, and create amazing things!</p>
<!-- /wp:paragraph -->',
            )
        );
    }
endif;
add_action( 'init', 'webdescode_register_about_layout_pattern' );
