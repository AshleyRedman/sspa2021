<?php

/**
 * Register ACF Blocks
 */
function register_blocks()
{
    if (function_exists('acf_register_block_type')) {

        /**
         * Container Block
         */
        acf_register_block_type([
            'name'              => 'container',
            'title'             => __('Container Block'),
            'description'       => __('Custom block to contain inner blocks'),
            'render_template'   => 'app/Blocks/container/container.php',
            'category'          => 'design',
            'icon'              => 'layout',
            'keywords'          => ['container', 'section'],
            'enqueue_style'     => false,
            'supports'          => [
                'align'     => false,
                'mode'      => false,
                'jsx'       => true,
            ]
        ]);

    }
}
add_action('acf/init', 'register_blocks');