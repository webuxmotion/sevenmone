<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

if (!function_exists('localized_url')) {
    function localized_url(string $path, ?string $locale = null): string
    {
        $locale = $locale ?? App::getLocale();
        $baseLocale = DB::table('languages')->where('base', 1)->value('code') ?? 'uk';

        // Якщо обрана мова — базова, не додаємо префікс
        if ($locale === $baseLocale) {
            return url($path);
        }

        // Якщо інша мова — додаємо префікс
        return url($locale . '/' . ltrim($path, '/'));
    }
}

function in_wishlist($productId)
{
    return in_array($productId, view()->shared('wishlistIds', []));
}
