<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryService::getAll(request()->get('name'));

        return $categories;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    public function showBySlug($slug)
    {
        return Category::whereSlug($slug)
            ->with('products')
            ->firstOrFail();
    }
}
