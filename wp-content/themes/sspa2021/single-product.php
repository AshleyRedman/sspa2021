<?php

/**
 * The Template for displaying all single posts
 */

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Product;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Timber\Timber;

class SingleProductController extends Controller
{
    public function handle() : TimberResponse {

        $context = Timber::get_context();

        $post = new Post();
        $context['post'] = $post;
        $product = new Product();

        $context['related_products'] = $product->getRelatedProducts(wc_get_product($post->ID));

        return new TimberResponse('product/single.twig', $context, '200');
    }
}
