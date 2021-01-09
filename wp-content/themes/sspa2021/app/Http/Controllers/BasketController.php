<?php

namespace App\Http\Controllers;

use Rareloop\Lumberjack\Http\Controller as BaseController;
use Rareloop\Lumberjack\Http\ServerRequest;

class BasketController extends BaseController
{

    public function addToBasket(ServerRequest $request, $productId, $variationId)
    {
        global $woocommerce;
        $woocommerce->cart->add_to_cart($productId, 1, $variationId);

        wp_safe_redirect(wc_get_cart_url(), '302', 'WordPress');
    }

}
