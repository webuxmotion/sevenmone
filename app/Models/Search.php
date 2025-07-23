<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public static function get_search_products($searchPhrase, $languageId, $perPage = 20)
    {
        $productsQuery = Product::leftJoin('product_descriptions', function ($join) use ($languageId) {
            $join->on('products.id', '=', 'product_descriptions.product_id')
                ->where('product_descriptions.language_id', '=', $languageId);
        })
            ->where('product_descriptions.title', 'LIKE', '%' . $searchPhrase . '%')
            ->orWhere('product_descriptions.content', 'LIKE', '%' . $searchPhrase . '%')
            ->orWhere('product_descriptions.excerpt', 'LIKE', '%' . $searchPhrase . '%')
            ->select('products.*', 'product_descriptions.title as description_title');

        $products = $productsQuery->paginate($perPage)->withQueryString();
        $products->load(['gallery', 'description']);

        return $products;
    }
}
