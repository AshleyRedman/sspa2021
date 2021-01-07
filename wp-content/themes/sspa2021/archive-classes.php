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
use App\PostTypes\SSPAClass;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Timber\Timber;

class ArchiveClassesController extends Controller
{
    public function handle() : TimberResponse
    {
        $data = Timber::get_context();

        $classes = SSPAClass::builder()->whereStatus('publish')->get();

        $data['classes'] = $classes;

        return new TimberResponse('classes/archive.twig', $data, 200);
    }
}
