<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class LangSwitcher extends Component
{
    public string $currentLocale;
    public string $baseLocale;
    public array $languages;

    public function __construct()
    {
        $this->currentLocale = app()->getLocale();

        // Отримуємо базову мову з бази (наприклад, 'uk')
        $this->baseLocale = DB::table('languages')
            ->where('base', 1)
            ->value('code') ?? 'uk';

        // Отримуємо всі мови з URL для перемикання
        $this->languages = DB::table('languages')
            ->select('code', 'title')
            ->get()
            ->map(function ($lang) {
                return [
                    'code' => $lang->code,
                    'title' => $lang->title,
                    'url' => $this->getUrlForLocale($lang->code),
                ];
            })
            ->toArray();
    }

    public function getUrlForLocale(string $locale): string
    {
        $currentUri = request()->path(); // Поточний URI, наприклад 'en/products' або 'products'

        // Масив мов, які мають префікс у URI (всі крім базової)
        $languagesWithPrefix = DB::table('languages')
            ->where('base', 0)
            ->pluck('code')
            ->toArray();

        // Прибираємо будь-який мовний префікс (тільки для мов з префіксом)
        foreach ($languagesWithPrefix as $lang) {
            if (str_starts_with($currentUri, $lang . '/')) {
                $currentUri = substr($currentUri, strlen($lang) + 1);
                break;
            } elseif ($currentUri === $lang) {
                $currentUri = '';
                break;
            }
        }

        // Якщо обираємо базову мову — повертаємо URI без префікса
        if ($locale === $this->baseLocale) {
            return url($currentUri);
        }

        // Інакше додаємо префікс мови, якщо його немає
        return url($locale . ($currentUri ? '/' . $currentUri : ''));
    }

    public function render()
    {
        return view('components.lang-switcher');
    }
}
