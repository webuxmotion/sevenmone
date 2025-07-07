<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slide extends Model
{
    public function description()
    {
        $languageId = DB::table('languages')
            ->where('code', app()->getLocale())
            ->value('id');

        return $this->hasOne(SlideDescription::class)
            ->where('language_id', $languageId);
    }
}
