<div class="dropdown lang-switcher">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="langSwitcherDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        @if($currentLocale === 'uk')
            🇺🇦 Українська
        @else
            🇬🇧 English
        @endif
    </button>
    <ul class="dropdown-menu" aria-labelledby="langSwitcherDropdown">
        <li><a class="dropdown-item" href="{{ $getUrlForLocale('uk') }}">🇺🇦 Українська</a></li>
        <li><a class="dropdown-item" href="{{ $getUrlForLocale('en') }}">🇬🇧 English</a></li>
    </ul>
</div>