<?php
/**
 * Register custom block patterns for WebDesCode theme.
 *
 * @since WebDesCode 1.8
 */
if ( ! function_exists( 'webdescode_register_block_patterns' ) ) :
    function webdescode_register_block_patterns() {
        // Registering a simple two-column layout pattern.
        register_block_pattern(
            'webdescode/two-column-layout',
            array(
                'title'       => __( 'Two Column Layout', 'webdescode' ),
                'description' => __( 'A simple two-column layout with text and image.', 'webdescode' ),
                'categories'  => array( 'webdescode-layouts' ), // Link to the "Layouts" category.
                'content'     => '<!-- wp:columns -->
                                 <div class="wp-block-columns">
                                   <div class="wp-block-column" style="flex-basis:50%">
                                       <!-- wp:paragraph -->
                                       <p>' . __( 'Your content goes here.', 'webdescode' ) . '</p>
                                       <!-- /wp:paragraph -->
                                   </div>
                                   <div class="wp-block-column" style="flex-basis:50%">
                                       <!-- wp:image -->
                                       <figure class="wp-block-image"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0dDqde80BaQzTM3zxyTblocihUTkaveR-5A&s" alt=""/></figure>
                                       <!-- /wp:image -->
                                   </div>
                                 </div>
                                 <!-- /wp:columns -->',
            )
        );

        // Registering a "Call to Action" block pattern.
        register_block_pattern(
            'webdescode/call-to-action',
            array(
                'title'       => __( 'Call to Action', 'webdescode' ),
                'description' => __( 'A simple call-to-action section with a button.', 'webdescode' ),
                'categories'  => array( 'webdescode-layouts' ), // Link to the "Layouts" category.
                'content'     => '<!-- wp:group -->
                                 <div class="wp-block-group">
                                   <p>' . __( 'Your call to action content here.', 'webdescode' ) . '</p>
                                   <!-- wp:button -->
                                   <div class="wp-block-button"><a class="wp-block-button__link" href="#">' . __( 'Click Here', 'webdescode' ) . '</a></div>
                                   <!-- /wp:button -->
                                 </div>
                                 <!-- /wp:group -->',
            )
        );
    }
endif;
add_action( 'init', 'webdescode_register_block_patterns' );