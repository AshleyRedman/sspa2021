<?php

/**
 * The Template for displaying all single posts
 */

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Timber\Timber;

class SingleController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $post = new Post();

        $context['post'] = $post;

        if ( post_password_required( $post->ID ) ) {
            return new TimberResponse('templates/single-password.twig', $context, '200');
        } else {
            return new TimberResponse([
                'single-' . $post->ID . '.twig',
                $post->post_type . '/single.twig',
                'templates/single.twig'
            ], $context);
        }
    }
}
