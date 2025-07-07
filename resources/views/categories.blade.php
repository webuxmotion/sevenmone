<h1>Категорії</h1>

<x-lang-switcher />

<ul>
    @foreach ($categories as $category)
        <li>
            <strong>ID:</strong> {{ $category->id }} <br>
            <strong>Slug:</strong> {{ $category->slug }} <br>
            <strong>Title:</strong> {{ $category->description->title ?? 'Немає опису' }} <br>
            <strong>Content:</strong> {!! $category->description->content ?? '' !!}
        </li>
    @endforeach
</ul>