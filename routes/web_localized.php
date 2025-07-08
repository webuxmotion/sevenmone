<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;

Route::get('/', function () {
    $hits = Product::with('description')
        ->where('hit', '=', 1)
        ->get();

    return view('index', compact('hits')); // твоя головна сторінка
})->name('home');

Route::get('/categories', function () {
    $categories = Category::with('description')->get();
    return view('categories', compact('categories'));
})->name('categories');


Route::get('/products', function () {
    $products = Product::with('description')->get();

    return view('products', compact('products'));
})->name('home');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
