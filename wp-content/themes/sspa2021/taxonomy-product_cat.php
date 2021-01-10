<?php

/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Product;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Timber\Term;
use Timber\Timber;

class TaxonomyProductCatController extends Controller
{
    public function handle() : TimberResponse
    {
        $data = Timber::get_context();

        $query = get_queried_object();


        $product = new Product();
        $data['products'] = $product->getProductsByTerm(new Term($query->slug));

//        dump($data);
//        die();

        return new TimberResponse('product/archive.twig', $data, 200);
    }
}
