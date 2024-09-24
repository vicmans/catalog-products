<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscriberController;

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{slug}', [CategoryController::class, 'showBySlug']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{slug}', [ProductController::class, 'showBySlug']);

Route::post('/subscribe', [SubscriberController::class, 'subscribe']);
Route::post('/unsubscribe', [SubscriberController::class, 'unsubscribe']);