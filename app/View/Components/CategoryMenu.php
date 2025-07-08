<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class CategoryMenu extends Component
{
    public $categories;

    public function __construct($categories = null)
    {
        if ($categories) {
            // Категорії передані ззовні (наприклад, при рекурсії)
            $this->categories = $categories;
        } else {
            // Верхній рівень (root): беремо з бази
            $languageId = app()->getLocaleId();

            $this->categories = Category::with([
                'description' => fn($q) => $q->where('language_id', $languageId),
                'childrenRecursive.description' => fn($q) => $q->where('language_id', $languageId),
            ])
                ->where('parent_id', 0)
                ->get();
        }
    }

    public function render()
    {
        return view('components.category-menu');
    }
}