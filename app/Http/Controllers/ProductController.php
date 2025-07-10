<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::with('description')->where('slug', $slug)->firstOrFail();

        return view('product.show', compact('product'));
    }
}
