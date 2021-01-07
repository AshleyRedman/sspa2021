<?php

namespace Config;

class Scripts
{
    private $ASSET_VERSION = 1.2;

    public function __construct()
    {
        add_action('login_enqueue_scripts', [$this, 'login']);
        add_action('wp_enqueue_scripts', [$this, 'theme']);
        add_action('enqueue_block_assets', [$this, 'block_and_theme']);
        add_action('enqueue_block_editor_assets', [$this, 'block_only']);
    }

    public function login()
    {
    }

    public function theme()
    {
        wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/build/css/normalize.css', [], $this->ASSET_VERSION, 'all');
        wp_enqueue_style('app', get_stylesheet_directory_uri() . '/build/css/app.css', ['normalize'], $this->ASSET_VERSION, 'all');

        wp_enqueue_script('manifest', get_stylesheet_directory_uri() . '/build/js/manifest.js', [], $this->ASSET_VERSION, true);
        wp_enqueue_script('vendor', get_stylesheet_directory_uri() . '/build/js/vendor.js', ['manifest'], $this->ASSET_VERSION, true);

        wp_enqueue_script('index', get_stylesheet_directory_uri() . '/build/js/index.js', ['vendor'], $this->ASSET_VERSION, true);
        wp_enqueue_script('app', get_stylesheet_directory_uri() . '/build/js/app.js', ['vendor'], $this->ASSET_VERSION, true);
    }

    public function block_and_theme()
    {
        wp_enqueue_style('fa', get_stylesheet_directory_uri() . '/build/fa/css/all.min.css', [], $this->ASSET_VERSION, 'all');
        wp_enqueue_script('fa', get_stylesheet_directory_uri() . '/build/fa/js/all.min.js', [], $this->ASSET_VERSION, false);

        wp_enqueue_style('google-fonts-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', [], $this->ASSET_VERSION, 'all');
        wp_enqueue_style('vars', get_stylesheet_directory_uri() . '/build/css/var.css', ['google-fonts-roboto'], $this->ASSET_VERSION, 'all');
        wp_enqueue_style('global', get_stylesheet_directory_uri() . '/build/css/global.css', ['vars'], $this->ASSET_VERSION, 'all');
        wp_enqueue_style('utilities', get_stylesheet_directory_uri() . '/build/css/utilities.css', ['vars'], $this->ASSET_VERSION, 'all');
    }

    public function block_only()
    {
        wp_enqueue_style('editor', get_stylesheet_directory_uri() . '/build/css/editor.css', [], $this->ASSET_VERSION, 'all');
    }
}

new Scripts();
