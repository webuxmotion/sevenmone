<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Wishlist extends Model
{
    // Define cookie key in one place
    protected static $cookieKey = 'wishlist_ids';

    // Add product ID to wishlist cookie if product exists
    public static function add($productId)
    {
        if (!Product::find($productId)) {
            return false;
        }

        $ids = self::get_wishlist_ids();

        if (!in_array($productId, $ids)) {
            $ids[] = $productId;
            self::saveToCookie($ids);
        }

        return true;
    }

    // Remove product ID from wishlist
    public static function remove($productId)
    {
        if (!Product::find($productId)) {
            return false;
        }

        $ids = self::get_wishlist_ids();

        if (in_array($productId, $ids)) {
            $ids = array_filter($ids, fn($id) => $id != $productId);
            self::saveToCookie(array_values($ids));
        }
        
        return true;
    }

    // Get all product IDs from wishlist
    public static function get_wishlist_ids()
    {
        $cookie = Cookie::get(self::$cookieKey);
        $decoded = json_decode($cookie, true);

        return is_array($decoded) ? $decoded : [];
    }

    // Save updated list to cookie (30 days)
    protected static function saveToCookie(array $ids)
    {
        Cookie::queue(self::$cookieKey, json_encode($ids), 60 * 24 * 30);
    }
}
