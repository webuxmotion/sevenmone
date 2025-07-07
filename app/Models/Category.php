<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public function description()
    {
        // Отримуємо id мови по коду локалі з таблиці languages
        $languageId = DB::table('languages')
            ->where('code', app()->getLocale())
            ->value('id');

        return $this->hasOne(CategoryDescription::class, 'category_id')
            ->where('language_id', $languageId);
    }
}
