<?php

namespace App;

class Enrollment
{
    public function getAvailableVariations(\WC_Product $product): array
    {
        $wooData = $product->get_available_variations();
        $available_products = [];

        if (!empty($wooData)) {
            foreach ($wooData as $var) {
                $id = $var['variation_id'];
                $prod = wc_get_product($id);
                $prod->variation_id = $id;
                $has_class_dates = get_post_meta($id, 'has_class_dates');

                if (!empty($has_class_dates)) {
                    $prod->has_dates = true;
                    $prod->start_date = get_post_meta($id, 'class_start_date')[0];
                    $prod->end_date = get_post_meta($id, 'class_end_date')[0];
                } else {
                    $prod->has_dates = false;
                }

                $available_products[] = $prod;
            }
        }

        return $available_products;
    }
}
