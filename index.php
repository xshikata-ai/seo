<?php
include dirname(__FILE__) . '/.private/config.php';
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Serve home.html as the Landing Page
|--------------------------------------------------------------------------
|
| If the request is for the root URL ("/"), then serve home.html directly
| instead of booting Laravel. All other routes will continue to work normally.
|
*/
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '/index.php') {
    $landing = __DIR__ . '/home.html';
    if (file_exists($landing)) {
        header('Content-Type: text/html; charset=utf-8');
        readfile($landing);
        exit;
    }
}


// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/core/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/core/bootstrap/app.php')
    ->handleRequest(Request::capture());
