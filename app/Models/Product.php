<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public function description()
    {
        // Отримуємо id мови по коду локалі з таблиці languages
        $languageId = DB::table('languages')
            ->where('code', app()->getLocale())
            ->value('id');

        return $this->hasOne(ProductDescription::class, 'product_id')
            ->where('language_id', $languageId);
    }
}
