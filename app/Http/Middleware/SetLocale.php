<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1); // перший сегмент у URL, напр. "en" або "uk"

        // Отримаємо всі доступні коди мов з БД
        $supportedLocales = cache()->rememberForever('supported_locales', function () {
            return DB::table('languages')->pluck('code')->toArray();
        });

        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
        } else {
            // встановлюємо базову мову з БД
            $defaultLocale = cache()->rememberForever('base_locale', function () {
                return DB::table('languages')->where('base', 1)->value('code') ?? 'uk';
            });

            App::setLocale($defaultLocale);
        }

        return $next($request);
    }
}
