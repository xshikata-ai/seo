<?php
include dirname(__FILE__) . '/.private/config.php';
define('BASE_PATH', dirname(__FILE__));

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    include BASE_PATH . '/' . $class . '.php';
});

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim(str_replace('tudriver', '', $uri), '/'); // Elimina 'tudriver' de la ruta
$segments = explode('/', $uri);

$controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
$action = isset($segments[1]) ? $segments[1] : 'index';

if (class_exists("controllers\\$controllerName")) {
    $controller = new ("controllers\\$controllerName")();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        header("HTTP/1.0 404 Not Found");
        echo '404 - Página no encontrada';
    }
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 - Controlador no encontrado';
}
