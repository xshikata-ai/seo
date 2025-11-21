<?php
include dirname(__FILE__) . '/.private/config.php';
/**
 * Laravel - A PHP Framework For Web Artisans
 */

// Define the document root path
$publicPath = __DIR__ . '/public';

// Get the requested URI
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// Handle static assets (CSS, JS, images)
$assetPattern = '/^\/(css|js|images|favicon\.ico|manifest\.json|robots\.txt|sw\.js)/i';
if (preg_match($assetPattern, $uri, $matches)) {
    $requestPath = $publicPath . $uri;
    
    if (file_exists($requestPath)) {
        // Determine the appropriate content type based on file extension
        $extension = pathinfo($requestPath, PATHINFO_EXTENSION);
        $contentTypes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'json' => 'application/json',
            'txt' => 'text/plain',
            'webp' => 'image/webp'
        ];
        
        if (isset($contentTypes[$extension])) {
            header('Content-Type: ' . $contentTypes[$extension]);
        }
        
        // Output the file contents
        readfile($requestPath);
        exit;
    }
}

// For all other requests, bootstrap Laravel
define('LARAVEL_START', microtime(true));

// Check for maintenance mode
if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register Composer autoloader
require __DIR__.'/vendor/autoload.php';

// Bootstrap the application
$app = require_once __DIR__.'/bootstrap/app.php';

// Set the public path to the current directory
$app->bind('path.public', function() {
    return __DIR__;
});

// Run the application
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
