<?php

namespace App\Http;

use Rareloop\Lumberjack\Http\Lumberjack as LumberjackCore;
use App\Menu\Menu;

class Lumberjack extends LumberjackCore
{
    public function addToContext($context)
    {
        $context['is_home'] = is_home();
        $context['is_front_page'] = is_front_page();
        $context['is_logged_in'] = is_user_logged_in();

        if (class_exists('WooCommerce')) {
            global $woocommerce;
                // is
            $context['is_woocommerce'] = is_woocommerce();
            $context['is_account'] = is_account_page();
            $context['is_shop'] = is_shop();
            $context['is_product_category'] = is_product_category();
            $context['is_product'] = is_product();
            $context['is_cart'] = is_cart();
            $context['is_checkout'] = is_checkout();
            $context['cart_url'] = wc_get_cart_url();
            $context['cart_count'] = $woocommerce->cart->get_cart_total();

            // users perma
            $context['user_account_url'] = get_permalink(get_option('woocommerce_myaccount_page_id'));
        }

        // Menus
        $context['main_menu'] = new Menu('main-menu', [
            'depth' => 2,
            'theme_location' => 'main-menu'
        ]);
        $context['socket_menu'] = new Menu('socket-menu', [
            'depth' => 1,
            'theme_location' => 'socket-menu'
        ]);

        $context['store_notice'] = get_field('store_notice', 'option');

        return $context;
    }
}
