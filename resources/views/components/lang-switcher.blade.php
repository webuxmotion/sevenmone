<div class="dropdown">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        🌐 {{ strtoupper($currentLocale) }}
    </button>

    <ul class="dropdown-menu" aria-labelledby="langDropdown">
        @foreach ($languages as $lang)
            <li>
                <a class="dropdown-item {{ $lang['code'] === $currentLocale ? 'active' : '' }}" 
                   href="{{ $lang['url'] }}">
                    {{ $lang['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>