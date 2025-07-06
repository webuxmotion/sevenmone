<?php

use Illuminate\Support\Facades\Route;

use App\Models\Category;

Route::get('/', function () {
    $categories = Category::all();

    return view('welcome', compact('categories'));
});
