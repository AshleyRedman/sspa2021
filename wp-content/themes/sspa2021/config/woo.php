<?php

/**
 * After WP bootstraps, check if the theme required terms exist & add them if not
 * TODO Find new home for this
 */
add_action('init', function () {
    if (class_exists('WooCommerce')) {
        if (taxonomy_exists('product_cat')) {
            if (!term_exists('class', 'product_cat')) {
                wp_insert_term('Class', 'product_cat', [
                    'description' => '',
                    'slug' => 'class'
                ]);
            }
            if (!term_exists('clothing', 'product_cat')) {
                wp_insert_term('Clothing', 'product_cat', [
                    'description' => '',
                    'slug' => 'clothing'
                ]);
            }
        }
    }
}, 10);

/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
function jk_dequeue_styles( $enqueue_styles ) {
//    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
//    unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
//    unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );

/**
 * Fix by Timber author for product teasing
 *
 * @param $post
 */
function timber_set_product( $post )
{
    global $product;

    if (is_woocommerce()) {
        $product = wc_get_product($post->ID);
    }
}


add_filter('woocommerce_return_to_shop_redirect', function()
{
    return site_url() . '/store';
});

add_filter('woocommerce_return_to_shop_text', function() {
    return 'Return to Store';
});