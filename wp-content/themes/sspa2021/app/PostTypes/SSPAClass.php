<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;

class SSPAClass extends Post
{
    /**
     * @var false|\WC_Product|null
     */
    public $product;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var array
     */
    public array $key_information;

    /**
     * @var array
     */
    public array $session_focus;

    /**
     * @var array
     */
    public array $course_information;

    public function __construct($id = false, $preventTimberInit = false)
    {
        parent::__construct($id, $preventTimberInit);

        $this->product= $this->setRelatedProduct();
        $this->description = $this->setDescription();
        $this->key_information = $this->setKeyInformation();
        $this->session_focus = $this->setSessionFocus();
        $this->course_information = $this->setCourseInformation();
    }

    /**
     * @return string
     */
    public static function getPostType(): string
    {
        return 'classes';
    }

    /**
     * @return array|null
     */
    protected static function getPostTypeConfig(): ?array
    {
        return [
            'labels' => [
                'name' => __('Classes'),
                'singular_name' => __('Class'),
                'add_new_item' => __('Add New Class'),
                'edit_item' => __('Edit Class'),
                'new_item' => __('New Class'),
                'view_item' => __('View Class'),
                'view_items' => __('View Classes'),
                'search_items' => __('Search all Classes'),
                'not_found' => __('No Classes Found'),
                'not_found_in_trash' => __('No Classes in Trash'),
                'all_items' => __('All Classes'),
                'archives' => __('Class Archives'),
                'insert_into_item' => __('Insert Classes Content'),
                'uploaded_to_this_item' => __('Uploaded to this Classes content'),
                'featured_image' => __('Featured Image'),
                'set_featured_image' => __('Upload Image'),
                'remove_featured_image' => __('Remove Image'),
                'use_featured_image' => __('Use Image'),
                'menu_name' => __('Classes'),
                'filter_items_list' => __('Filter Classes'),
                'items_list_navigation' => __('List More Classes'),
                'items_list' => __('Classes List'),
                'name_admin_bar' => __('Classes')
            ],
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => [
                'title',
                'editor',
                'thumbnail',
                //'author',
                //'excerpt',
                //'trackbacks',
                //'custom-fields',
                //'comments',
                //'revisions',
                // 'page-attributes',
                //'post-formats'
            ],
            'menu_position' => 5,
            'menu_icon' => 'dashicons-tag',
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'rest_base' => 'classes',
            'slug' => __('classes'),
        ];
    }

    /**
     * @return false|\WC_Product|null
     */
    private function setRelatedProduct() : \WC_Product
    {
        $obj = get_field('class_related_product');
        return wc_get_product($obj->ID);
    }

    /**
     * @return string
     */
    private function setDescription() : string
    {
        return get_field('class_description');
    }

    /**
     * @return array
     */
    private function setKeyInformation() : array
    {
        $data = get_field('class_key_information');
        if (!$data) return [];
        return $data;
    }

    /**
     * @return array
     */
    private function setSessionFocus() : array
    {
        $data = get_field('class_session_focus');
        if (!$data) return [];
        return $data;
    }

    /**
     * @return array
     */
    private function setCourseInformation() : array
    {
        $data = get_field('class_course_information');
        if (!$data) return [];
        return $data;
    }
}
