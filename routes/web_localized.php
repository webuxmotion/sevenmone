<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
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

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/modal', [CartController::class, 'modal'])->name('cart.modal');

Route::get('/search', [SearchController::class, 'index']);

Route::get('/wishlist', [WishlistController::class, 'show']);

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::post('/wishlist/add', [WishlistController::class, 'add']);
Route::post('/wishlist/delete', [WishlistController::class, 'delete']);