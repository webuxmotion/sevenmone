<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ['gallery', 'description'];

    public static function getById($id)
    {
        return self::with('description')->find($id);
    }

    public static function addToCart($product, $quantity = 1)
    {
        $quantity = max(1, (int) $quantity);

        $cart = session()->get('cart', [
            'items' => [],
            'quantity' => 0,
            'sum' => 0,
        ]);

        $id = $product->id;

        // Якщо товар вже є — оновлюємо кількість
        if (isset($cart['items'][$id])) {
            $cart['items'][$id]['quantity'] += $quantity;
        } else {
            // Додаємо новий товар
            $cart['items'][$id] = [
                'title' => $product->description->title ?? 'Unknown',
                'price' => (float) $product->price,
                'img' => $product->img,
                'quantity' => $quantity,
            ];
        }

        // Перерахунок загальної кількості і суми
        $cart['quantity'] = array_sum(array_column($cart['items'], 'quantity'));
        $cart['sum'] = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart['items']));

        session()->put('cart', $cart);
    }

    public static function deleteFromCart(Product $product)
    {
        $cart = session()->get('cart', [
            'items' => [],
            'quantity' => 0,
            'sum' => 0,
        ]);

        $id = $product->id;

        // Remove item if it exists
        if (isset($cart['items'][$id])) {
            unset($cart['items'][$id]);
        }

        // Recalculate quantity and sum
        $cart['quantity'] = array_sum(array_column($cart['items'], 'quantity'));
        $cart['sum'] = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart['items']));

        session()->put('cart', $cart);
    }

    public function description()
    {
        return $this->hasOne(ProductDescription::class, 'product_id')
            ->where('language_id', app()->getLocaleId());
    }

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
