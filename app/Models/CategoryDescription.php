<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryDescription extends Model
{
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}