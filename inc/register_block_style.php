<?php
/**
 * Register custom block styles for blocks.
 */

function webdescode_register_block_styles() {
    // Register a custom style for the core/button block
    register_block_style(
        'core/button',
        array(
            'name'  => 'webdescode-button-style',
            'label' => 'WebDesCode Button Style',
        )
    );
}
add_action( 'init', 'webdescode_register_block_styles' );
