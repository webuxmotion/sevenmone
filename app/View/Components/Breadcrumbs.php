<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\BreadcrumbsService;

class Breadcrumbs extends Component
{
    public $title;
    public $breadcrumbs;

    public function __construct($title = null)
    {
        $this->breadcrumbs = BreadcrumbsService::generate($title);
    }

    public function render()
    {
        return view('components.breadcrumbs');
    }
}
