<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function show()
    {
        $ids = Wishlist::get_wishlist_ids();

        $products = Product::whereIn('id', $ids)->get();

        return view('wishlist.show', compact('products'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:products,id',
        ]);

        $productId = $request->id;

        $success = Wishlist::add($productId);

        if (!$success) {
            return response()->json([
                'message' => 'Product not found or cannot be added to wishlist.',
            ], 404);
        }

        return response()->json([
            'message' => 'Product added to wishlist.',
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:products,id',
        ]);

        $productId = $request->id;

        $success = Wishlist::remove($productId);

        if (!$success) {
            return response()->json([
                'message' => 'Product not found or cannot be deleted from wishlist.',
            ], 404);
        }

        return response()->json([
            'message' => 'Product deleted from wishlist.',
        ]);
    }
}
