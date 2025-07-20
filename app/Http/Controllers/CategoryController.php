<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $categoryIds = Category::getAllNestedIds($category->id);

        $languageId = app()->getLocaleId();

        $productsQuery = Product::whereIn('category_id', $categoryIds)
            ->leftJoin('product_descriptions', function ($join) use ($languageId) {
                $join->on('products.id', '=', 'product_descriptions.product_id')
                    ->where('product_descriptions.language_id', '=', $languageId);
            })
            ->select('products.*', 'product_descriptions.title as description_title');

        $sort = $request->query('sort');

        switch ($sort) {
            case 'name_asc':
                $productsQuery->orderBy('description_title', 'asc');
                break;
            case 'name_desc':
                $productsQuery->orderBy('description_title', 'desc');
                break;
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            default:
                $productsQuery->orderBy('products.id', 'asc');
                break;
        }

        $products = $productsQuery->paginate(6)->withQueryString();

        // Завантажуємо відношення, щоб були gallery і description за мовою
        $products->load(['gallery', 'description']);

        return view('category.show', compact('category', 'products'));
    }
}
