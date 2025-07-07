<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideDescription extends Model
{
    public function slide()
    {
        return $this->belongsTo(Slide::class);
    }
}
