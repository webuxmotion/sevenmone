<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function getById($id)
    {
        return self::with('description')->find($id);
    }

    public static function addToCart($product, $quantity = 1)
    {
        $quantity = max(1, (int) $quantity);
        $cart = session()->get('cart', []);

        // Якщо товар існує, але його значення не масив — перезаписуємо
        if (!isset($cart[$product->id]) || !is_array($cart[$product->id])) {
            $cart[$product->id] = [
                'quantity' => 0,
                'title' => $product->description->title ?? 'Unknown',
                'price' => $product->price,
                'img' => $product->img,
            ];
        }

        // Додаємо кількість
        $cart[$product->id]['quantity'] += $quantity;

        // Оновлення загальної кількості
        $cart['quantity'] = array_sum(array_map(fn($item) => is_array($item) ? $item['quantity'] : 0, $cart));

        // Оновлення суми
        $cart['sum'] = array_sum(array_map(fn($item) => is_array($item) ? $item['quantity'] * $item['price'] : 0, $cart));

        session()->put('cart', $cart);
    }

    public function description()
    {
        return $this->hasOne(ProductDescription::class, 'product_id')
            ->where('language_id', app()->getLocaleId());
    }
}
