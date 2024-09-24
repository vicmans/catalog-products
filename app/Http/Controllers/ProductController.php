<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductService::getAll(request()->get('name'));

        return $products;
    }

    public function showBySlug($slug)
    {
        return Product::whereSlug($slug)->firstOrFail(); // Devuelve producto por slug
    }
}
