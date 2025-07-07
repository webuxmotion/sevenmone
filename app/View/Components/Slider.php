<?php

namespace App\View\Components;

use App\Models\Slide;
use Illuminate\View\Component;

class Slider extends Component
{
    public $slides;

    public function __construct()
    {
        $this->slides = Slide::with('description')->get();
    }

    public function render()
    {
        return view('components.slider');
    }
}
