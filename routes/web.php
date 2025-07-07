<?php

use Illuminate\Support\Facades\Route;

// Ukrainian — без префікса
Route::group([], function () {
    require __DIR__ . '/web_localized.php';
});

// English — з префіксом /en і префіксом до route name
Route::prefix('en')->name('en.')->group(function () {
    require __DIR__ . '/web_localized.php';
});
