<?php

/**
 * Set used editor for each entity
 *
 * @param [type] $is_enabled
 * @param [type] $post_type
 * @return void
 */
function editor($is_enabled, $post_type)
{
    $block_editor = []; // default
    $classic_editor = ['classes'];

    if (!empty($block_editor)) {
        foreach ($block_editor as $pt) {
            if ($post_type === $pt) return true;
        }
    }

    if (!empty($classic_editor)) {
        foreach ($classic_editor as $pt) {
            if ($post_type === $pt) return false;
        }
    }

    return $is_enabled;
}

add_filter('use_block_editor_for_post_type', 'editor', 10, 2);
