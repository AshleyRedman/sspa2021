<?php

require_once('vendor/autoload.php');

if (!class_exists('WooCommerce')) {
    add_action('admin_notices', function () {
            echo '<div class="error"><p>This theme requires <a href="https://woocommerce.com/">Woocommerce</a> to be active!</p><p>Your site will not work until <a href="https://woocommerce.com/">Woocommerce</a> is enabled!</p></div>';
        }
    );
}

use App\Http\Lumberjack;

// Create the Application Container
$app = require_once('bootstrap/app.php');

// Bootstrap Lumberjack from the Container
$lumberjack = $app->make(Lumberjack::class);
$lumberjack->bootstrap();

// Import our routes file
require_once('routes.php');

// Set global params in the Timber context
add_filter('timber_context', [$lumberjack, 'addToContext']);
