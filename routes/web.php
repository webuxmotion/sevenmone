<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Завантажуємо всі мови
$languages = DB::table('languages')->select('code', 'base')->get();

// Знаходимо базову мову (base=1)
$baseLanguage = $languages->firstWhere('base', 1);

foreach ($languages as $language) {
    if ($language->base) {
        // Для базової мови — без префікса
        Route::group([], function () {
            require __DIR__ . '/web_localized.php';
        });
    } else {
        // Для інших мов — з префіксом і префіксом імені
        Route::prefix($language->code)
            ->name($language->code . '.')
            ->group(function () {
                require __DIR__ . '/web_localized.php';
            });
    }
}
