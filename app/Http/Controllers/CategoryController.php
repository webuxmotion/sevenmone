<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::where(column: 'slug', operator: $slug)
            ->firstOrFail();
        
        $categoryIds = Category::getAllNestedIds($category->id);

        $products = Product::whereIn('category_id', $categoryIds)->get();

        return view('category.show', compact('category', 'products'));
    }
}
