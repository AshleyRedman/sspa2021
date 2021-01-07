<?php

// Define path and URL to the ACF plugin.
define('MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/');
define('MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/');

// Include the ACF plugin.
include_once(MY_ACF_PATH . 'acf.php');

/**
 * Customize the url setting to fix incorrect asset URLs.
 *
 * @param $url
 *
 * @return string
 */
function my_acf_settings_url($url): string
{
    return MY_ACF_URL;
}

add_filter('acf/settings/url', 'my_acf_settings_url');

/**
 * (Optional) Hide the ACF admin menu item.
 *
 * @param $show_admin
 *
 * @return bool
 */
function my_acf_settings_show_admin($show_admin): bool
{
    if (current_user_can('install_plugins')) {
        return true;
    } else {
        return false;
    }
}

add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
