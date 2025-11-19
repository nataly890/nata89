<?php

namespace App\Controller;

require_once __DIR__ . '/../Model/Product.php';
use App\Model\Product;

class ProductsController
{
    public function index()
    {
        $products = Product::all();
        require __DIR__ . '/../../views/index.php';
    }

    public function store()
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'price' => $_POST['price'] ?? 0,
            'stock' => $_POST['stock'] ?? 0,
            'description' => $_POST['description'] ?? '',
        ];

        Product::create($data);
        // simple flash via session
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $_SESSION['success'] = 'Producto agregado correctamente.';
        header('Location: /');
        exit;
    }
}
