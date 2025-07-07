<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;

Route::get('/', function () {
    return view('welcome'); // твоя головна сторінка
})->name('home');

Route::get('/categories', function () {
    $categories = Category::with('description')->get();
    return view('categories', compact('categories'));
})->name('categories');
