<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;
use Timber\Term;
use Timber\Image;

class Product
{
    private $postType;

    public function __construct()
    {
        $this->postType = 'product';
    }

    private function setProduct(Post $post) : \WC_Product
    {
        $product = wc_get_product($post->ID);
        $product->image = new Image(get_post_thumbnail_id($post->ID));
        $product->link = get_permalink($post->ID);

        return $product;
    }

    public function getProductsByTerm(Term $term) : array
    {
        $posts = get_posts([
            'post_type' => $this->postType,
            'numberposts' => -1,
            'tax_query' => [
                [
                    'taxonomy' => $term->taxonomy,
                    'field' => 'slug',
                    'terms' => $term->name
                ]
            ]
        ]);

        $products = [];

        foreach ($posts as $post) {
            $products[] = $this->setProduct(new Post($post));
        }

        return $products;
    }

    public function getRelatedProducts(\WC_Product $product) : array
    {
        $woo_products = wc_get_related_products($product->ID);

        $related = [];
        if (!empty($woo_products)) {
            foreach ($woo_products as $id) {
                $related[] = $this->setProduct(new Post($id));
            }
        }

        return $related;
    }
}
