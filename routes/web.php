<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

if (Schema::hasTable('languages')) {
    // Завантажуємо всі мови
    $languages = DB::table('languages')->select('code', 'base')->get();

    // Знаходимо базову мову (base=1)
    $baseLanguage = $languages->firstWhere('base', 1);

    foreach ($languages as $language) {
        Route::prefix($language->code)
            ->name($language->code . '.')
            ->group(function () {
                require __DIR__ . '/web_localized.php';

                Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
            });

        // The routes for base language can also work without lang code in url
        if ($language->base) {
            Route::group([], function () {
                require __DIR__ . '/web_localized.php';
            });
        }
    }
}
