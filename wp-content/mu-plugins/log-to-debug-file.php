<?php

/**
 * Plugin Name: Log to WP DEBUG file
 * Plugin URI:
 * Description:
 * Author: Ashley Redman
 * Author URI:
 * Version: 1.0.0
 * Text Domain:
 * Domain Path: languages
 * Tested up to: 5.6
 */

namespace AR;

Class Log
{
    public function __construct($data)
    {
        if (!function_exists('write_log')) {
            function write_log($log)
            {
                if (is_array($log) || is_object($log)) {
                    error_log(print_r($log, true));
                } else {
                    error_log($log);
                }
            }
        }

        write_log($data);
    }
}