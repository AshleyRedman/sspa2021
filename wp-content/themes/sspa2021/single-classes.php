<?php

namespace App;

use Timber\Timber;
use App\PostTypes\SSPAClass;
use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;

/**
 * SSPA Class Template Handle class
 */
class SingleClassesController extends Controller
{
    public function handle() : TimberResponse
    {
        $context = Timber::get_context();
        $context['class'] = new SSPAClass();
//        dump($context);
//        die();

        $product = $context['class']->product;

        return new TimberResponse('classes/single.twig', $context);
    }
}
