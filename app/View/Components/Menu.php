<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class Menu extends Component
{
    protected $data;
    protected $tree;
    protected $tpl = "components.menu";

    /**
     * Create a new component instance.
     */
    public function __construct($tpl = '')
    {
        if ($tpl) {
            $this->tpl = $tpl;
        }

        $languageId = app()->getLocaleId();

        $this->data = Category::with([
            'description' => fn($q) => $q->where('language_id', $languageId),
        ])
            ->get();

        $this->tree = $this->getTree();
    }

    protected function getTree()
    {
        $grouped = $this->data->groupBy('parent_id');

        $buildTree = function ($parentId) use (&$buildTree, $grouped) {
            return $grouped->get($parentId, collect())->map(function ($item) use ($buildTree) {
                $item['children'] = $buildTree($item['id']);
                return $item;
            });
        };

        $tree = $buildTree(0);

        return $tree;
    }

    public function render()
    {
        $tree = $this->tree;

        return view($this->tpl, compact('tree'));
    }
}
