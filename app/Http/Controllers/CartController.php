<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::getById($request->id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        Product::addToCart($product, $request->quantity);

        return response()->json([
            'success' => true,
            'message' => __('cart.added'),
            'cart' => session('cart'),
        ]);
    }
}
