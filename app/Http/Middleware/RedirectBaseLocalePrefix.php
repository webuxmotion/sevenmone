<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class RedirectBaseLocalePrefix
{
    public function handle($request, Closure $next)
    {
        $baseLocale = DB::table('languages')->where('base', 1)->value('code');

        $firstSegment = $request->segment(1);

        if ($firstSegment === $baseLocale) {
            // Видаляємо перший сегмент (базову мову) з URL
            $segments = $request->segments();
            array_shift($segments);
            $newUrl = '/' . implode('/', $segments);

            // Якщо URL пустий, то редіректимо на /
            if ($newUrl === '/') {
                return redirect('/');
            }

            return redirect($newUrl);
        }

        return $next($request);
    }
}