<?php

add_action('woocommerce_product_after_variable_attributes', 'variation_settings_fields', 10, 3);
add_action('woocommerce_save_product_variation', 'save_variation_settings_fields', 10, 2);
add_filter('woocommerce_available_variation', 'load_variation_settings_fields');

/**
 * @param $loop
 * @param $variation_data
 * @param $variation
 */
function variation_settings_fields($loop, $variation_data, $variation)
{
    woocommerce_wp_checkbox(
        array(
            'id' => "has_class_dates{$loop}",
            'name' => "has_class_dates[{$loop}]",
            'value' => get_post_meta($variation->ID, 'has_class_dates', true),
            'label' => __('&nbsp; Has Class Dates?', 'woocommerce'),
            'desc_tip' => true,
            'description' => __('Select if this variation is for a class/course.', 'woocommerce'),
            'wrapper_class' => 'form-row form-row-full',
            'required' => true
        )
    );

    woocommerce_wp_text_input(
        array(
            'id' => "class_start_date{$loop}",
            'name' => "class_start_date[{$loop}]",
            'value' => get_post_meta($variation->ID, 'class_start_date', true),
            'label' => __('Class Start Date', 'woocommerce'),
            'desc_tip' => true,
            'description' => __('The start date of this variation.', 'woocommerce'),
            'wrapper_class' => 'form-row form-row-first',
        )
    );

    woocommerce_wp_text_input(
        array(
            'id' => "class_end_date{$loop}",
            'name' => "class_end_date[{$loop}]",
            'value' => get_post_meta($variation->ID, 'class_end_date', true),
            'label' => __('Class End Date', 'woocommerce'),
            'desc_tip' => true,
            'description' => __('The end date of this variation.', 'woocommerce'),
            'wrapper_class' => 'form-row form-row-last',
        )
    );
}

/**
 * @param $variation_id
 * @param $loop
 */
function save_variation_settings_fields($variation_id, $loop)
{
    $has_dates = $_POST['has_class_dates'][$loop]; // yes(weird) or null

    if (!is_null($has_dates)) {
        $start_date = $_POST['class_start_date'][$loop]; // string or empty string
        $end_date = $_POST['class_end_date'][$loop]; // string or empty string

        if (!empty($start_date) && !empty($end_date)) {
            update_post_meta($variation_id, 'has_class_dates', esc_attr($has_dates));
            update_post_meta($variation_id, 'class_start_date', esc_attr($start_date));
            update_post_meta($variation_id, 'class_end_date', esc_attr($end_date));
        }
    }
}

/**
 * @param $variation
 *
 * @return mixed
 */
function load_variation_settings_fields($variation)
{
    $variation['has_class_dates'] = get_post_meta($variation['variation_id'], 'has_class_dates', true);
    $variation['class_start_date'] = get_post_meta($variation['variation_id'], 'class_start_date', true);
    $variation['class_end_date'] = get_post_meta($variation['variation_id'], 'class_end_date', true);

    return $variation;
}