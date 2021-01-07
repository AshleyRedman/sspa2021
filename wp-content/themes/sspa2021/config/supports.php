<?php

/**
 * Handles adding support and removign from the block editor
 */
class BlockEditor
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        add_action('init', [$this, 'add_theme_support']);
        add_action('init', [$this, 'remove_theme_support']);
    }

    /**
     * Add support
     *
     * @return void
     */
    public function add_theme_support()
    {
        add_theme_support('custom-spacing');
        add_theme_support('custom-line-height');
        add_theme_support('custom-units', 'px');
        add_theme_support('editor-font-sizes', [
            [
                'name' => __('XS', 'sspa'),
                'size' => 12,
                'slug' => 'xsm'
            ],
            [
                'name' => __('SM', 'sspa'),
                'size' => 14,
                'slug' => 'sm'
            ],
            [
                'name' => __('Base', 'sspa'),
                'size' => 16,
                'slug' => 'base'
            ],
            [
                'name' => __('MD', 'sspa'),
                'size' => 18,
                'slug' => 'md'
            ],
            [
                'name' => __('LG', 'sspa'),
                'size' => 21,
                'slug' => 'lg'
            ],
            [
                'name' => __('XLG', 'sspa'),
                'size' => 24,
                'slug' => 'xlg'
            ],
            [
                'name' => __('XXL', 'sspa'),
                'size' => 28,
                'slug' => 'xxlg'
            ],
            [
                'name' => __('XXXL', 'sspa'),
                'size' => 36,
                'slug' => 'xxxlg'
            ],
            [
                'name' => __('XXXXL', 'sspa'),
                'size' => 45,
                'slug' => 'xxxxlg'
            ],
        ]);
        add_theme_support('editor-color-palette', [
            [
                'name' => __('White', 'sspa'),
                'slug' => 'white',
                'color' => '#ffffff',
            ],
            [
                'name' => __('Black', 'sspa'),
                'slug' => 'black',
                'color' => '#000000',
            ],
            [
                'name' => __('SSPA Off White', 'sspa'),
                'slug' => 'sspa-off-white',
                'color' => '#F7F7F7',
            ],
            [
                'name' => __('SSPA Black', 'sspa'),
                'slug' => 'sspa-black',
                'color' => '#2C3841',
            ],
            [
                'name' => __('SSPA Grey', 'sspa'),
                'slug' => 'sspa-grey',
                'color' => '#2e2e2e',
            ],
            [
                'name' => __('SSPA Blue', 'sspa'),
                'slug' => 'sspa-blue',
                'color' => '#1c97c4',
            ],
        ]);
    }

    /**
     * Remove support
     *
     * @return void
     */
    public function remove_theme_support()
    {
        remove_post_type_support('page', 'comments');
        remove_post_type_support('post', 'comments');
        remove_post_type_support('classes', 'comments');
    }
}

new BlockEditor();
