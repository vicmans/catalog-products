<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public static function getAll($name = null)
    {
        return Category::when($name, function ($query) use ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        })->paginate(20);
    }
}
