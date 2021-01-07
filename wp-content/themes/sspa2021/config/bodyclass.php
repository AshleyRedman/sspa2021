<?php

/**
 * Add to the body class
 *
 * @param [type] $classes
 * @return void
 */
function add_to_body_class($classes)
{
    $classes[] = 'sspa2021';
    return $classes;
}

add_filter('body_class', 'add_to_body_class');
