<?php

namespace App\Controllers\client;

use App\Models\Product;


class HomeController
{
    public function index()
    {
        $product = new Product();
        $products =  $product->getAll();
        require 'views/home.php';
    }
}