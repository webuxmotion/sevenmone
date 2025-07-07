<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LangSwitcher extends Component
{
    public string $currentLocale;
    public string $switchToLocale;
    public string $switchUrl;

    public function __construct()
    {
        $this->currentLocale = app()->getLocale();

        if ($this->currentLocale === 'uk') {
            $this->switchToLocale = 'en';
            $this->switchUrl = $this->getUrlForLocale('en');
        } else {
            $this->switchToLocale = 'uk';
            $this->switchUrl = $this->getUrlForLocale('uk');
        }
    }


    public function getUrlForLocale(string $locale): string
    {
        $currentUri = request()->path();

        if ($locale === 'en') {
            if (!str_starts_with($currentUri, 'en')) {
                return url('en/' . ltrim($currentUri, '/'));
            }
            return url($currentUri);
        }

        // Switching to Ukrainian
        if ($currentUri === 'en') {
            // On English main page — switch to root '/'
            return url('/');
        }

        if (str_starts_with($currentUri, 'en/')) {
            return url(substr($currentUri, 3));
        }

        return url($currentUri);
    }

    public function render()
    {
        return view('components.lang-switcher');
    }
}
