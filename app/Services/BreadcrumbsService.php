<?php

namespace App\Services;

use App\Models\Product;

class BreadcrumbsService
{
    public static function generate(?string $lastTitle = null): array
    {
        $breadcrumbs = [];

        $segments = request()->segments();

        // Adjust for optional language prefix like /uk
        $productsIndex = in_array('products', $segments) ? array_search('products', $segments) : -1;

        // Check: if next segment after 'products' is slug and it is the last segment
        if ($productsIndex !== -1 && isset($segments[$productsIndex + 1]) && count($segments) === $productsIndex + 2) {
            $slug = $segments[$productsIndex + 1];
            $breadcrumbs = array_merge($breadcrumbs, self::getProductBreadcrumbs($slug));
        }

        return $breadcrumbs;
    }

    protected static function getProductBreadcrumbs(string $slug): array
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