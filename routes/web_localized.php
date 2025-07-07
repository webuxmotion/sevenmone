<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;

Route::get('/', function () {
    return view('index'); // твоя головна сторінка
})->name('home');

Route::get('/categories', function () {
    $categories = Category::with('description')->get();
    return view('categories', compact('categories'));
})->name('categories');


Route::get('/products', function () {
    $products = Product::with('description')->get();

    return view('products', compact('products'));
})->name('home');
