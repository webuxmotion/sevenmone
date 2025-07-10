<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

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

    public function delete($id)
    {
        $product = Product::getById($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        Product::deleteFromCart($product);

        return response()->json([
            'success' => true,
            'message' => __('cart.removed'),
            'cart' => session('cart'),
        ]);
    }

    public function modal(Request $request)
    {
        if (!$request->ajax()) {
            abort(403); // або 404, якщо хочеш приховати маршрут
        }

        $cart = Cart::get();

        return view('layouts.app.partials.cart_modal_content', compact('cart'));
    }
}
