
<?php
include dirname(__FILE__) . '/.private/config.php';
use Illuminate\Contracts\Http\Kernel;
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

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the app is in maintenance mode via the "down" command,
| include the maintenance file.
|
*/
if (file_exists($maintenance = __DIR__.'/application/storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Load Composer dependencies for the Laravel application.
|
*/
require __DIR__.'/application/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bootstrap The Application
|--------------------------------------------------------------------------
|
| Initialize the Laravel framework and handle the incoming request.
|
*/
$app = require_once __DIR__.'/application/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
