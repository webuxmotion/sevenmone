<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1); // перший сегмент URL

        if (in_array($locale, config('app.supported_locales'))) {
            App::setLocale($locale);
        } else {
            App::setLocale(config('app.locale')); // uk за замовчуванням
        }

        return $next($request);
    }
}
