<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public static function getAll($name = null)
    {
        return Product::when($name, function ($query) use ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        })->paginate(20);
    }
}
