<?php
// Simple front controller for the minimal MVC example
require_once __DIR__ . '/../src/Controller/ProductsController.php';

use App\Controller\ProductsController;

// basic routing
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$controller = new ProductsController();

if ($uri === '/products' && $method === 'POST') {
    $controller->store();
} elseif ($uri === '/' || $uri === '/products') {
    $controller->index();
} else {
    http_response_code(404);
    echo "Not Found";
}
