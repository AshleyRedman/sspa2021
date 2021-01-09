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
    /**
     * @return TimberResponse
     * @throws \Rareloop\Lumberjack\Exceptions\TwigTemplateNotFoundException
     */
    public function handle() : TimberResponse
    {
        $context = Timber::get_context();
        $context['class'] = new SSPAClass();
        $product = $context['class']->product;
        $enrollment = new Enrollment();
        $context['available_classes'] =  $enrollment->getAvailableVariations($product);

        return new TimberResponse('classes/single.twig', $context);
    }
}
