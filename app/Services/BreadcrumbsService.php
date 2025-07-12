<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;

class BreadcrumbsService
{
    public static function generate(?string $lastTitle = null): array
    {
        $breadcrumbs = [];

        $segments = request()->segments();

        // Adjust for optional language prefix like /uk
        $productsIndex = in_array('products', haystack: $segments) ? array_search('products', $segments) : -1;

        // Check: if next segment after 'products' is slug and it is the last segment
        if ($productsIndex !== -1 && isset($segments[$productsIndex + 1]) && count($segments) === $productsIndex + 2) {
            $slug = $segments[$productsIndex + 1];
            $breadcrumbs = array_merge($breadcrumbs, self::forProduct($slug));
        }

        // ✅ Handle category breadcrumbs
        $categoryIndex = array_search('category', $segments);

        if ($categoryIndex !== false && isset($segments[$categoryIndex + 1])) {
            $slug = $segments[$categoryIndex + 1];
            $category = Category::where('slug', $slug)->first();

            if ($category) {
                $breadcrumbs = array_merge($breadcrumbs, self::forCategory($category));
            }
        }

        return $breadcrumbs;
    }

    public static function forCategory(Category $category): array
    {
        $breadcrumbs = [];

        while ($category) {
            $breadcrumbs[] = [
                'label' => $category->description->title ?? $category->title ?? 'Unnamed',
                'url' => localized_url("/category/$category->slug"),
            ];

            // ⚠️ No relationship — fetch parent manually
            $category = Category::find($category->parent_id);
        }

        return array_reverse($breadcrumbs);
    }

    protected static function forProduct(string $slug): array
    {
        $breadcrumbs = [];

        $product = Product::where('slug', $slug)
            ->with(['category.description', 'description'])
            ->first();

        if (!$product) {
            return $breadcrumbs;
        }

        if ($product->category) {
            $breadcrumbs[] = [
                'label' => $product->category->description->title ?? $product->category->title,
                'url' => localized_url($product->category->slug),
            ];
        }

        $breadcrumbs[] = [
            'label' => $product->description->title ?? $product->title,
            'url' => null,
        ];

        return $breadcrumbs;
    }
}