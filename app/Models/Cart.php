<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;
use App\Models\Product;

class Cart
{
    protected const SESSION_KEY = 'cart';

    public static function get()
    {
        $cart = Session::get(self::SESSION_KEY, [
            'items' => [],
            'quantity' => 0,
            'sum' => 0,
        ]);

        $ids = array_keys($cart['items'] ?? []);

        if (empty($ids)) {
            return [
                'items' => [],
                'quantity' => 0,
                'sum' => 0,
            ];
        }

        // Отримуємо товари з БД
        $products = Product::whereIn('id', $ids)->get()->keyBy('id');

        $items = [];
        $totalQuantity = 0;
        $totalSum = 0;

        foreach ($cart['items'] as $id => $data) {
            if (!isset($products[$id])) {
                continue; // Якщо товар видалено з БД, пропускаємо
            }

            $product = $products[$id];

            $quantity = $data['quantity'] ?? 0;
            $price = $product->price;

            $items[$id] = [
                'id' => $id,
                'title' => $product->description->title ?? $product->title ?? 'No title',
                'price' => (float) $price,
                'img' => $product->img ?? '/public/uploads/no_image.jpg',
                'slug' => $product->slug,
                'quantity' => $quantity,
            ];

            $totalQuantity += $quantity;
            $totalSum += $price * $quantity;
        }

        return [
            'items' => $items,
            'quantity' => $totalQuantity,
            'sum' => $totalSum,
        ];
    }

    public static function clear() 
    {
        session()->put('cart', [
            'items' => [],
            'quantity' => 0,
            'sum' => 0,
        ]);
    }
}
