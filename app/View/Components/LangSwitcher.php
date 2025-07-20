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
        $queryString = request()->getQueryString();

        // Отримуємо всі мовні коди (включно з базовою)
        $allLangCodes = DB::table('languages')
            ->pluck('code')
            ->toArray();

        // Видаляємо мовний префікс, якщо він є на початку
        foreach ($allLangCodes as $langCode) {
            if (str_starts_with($currentUri, $langCode . '/')) {
                $currentUri = substr($currentUri, strlen($langCode) + 1);
                break;
            } elseif ($currentUri === $langCode) {
                $currentUri = '';
                break;
            }
        }

        // Rebuild base URL
        $localizedPath = $locale === $this->baseLocale
            ? $currentUri
            : $locale . ($currentUri ? '/' . $currentUri : '');

        $url = url($localizedPath);

        // Append query string if exists
        if ($queryString) {
            $url .= '?' . $queryString;
        }

        return $url;
    }

    public function render()
    {
        return view('components.lang-switcher');
    }
}
