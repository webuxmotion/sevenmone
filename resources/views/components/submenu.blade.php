<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach ($tree as $node)
        <li>
            <a class="dropdown-item" href="{{ localized_url("/category/$node->slug") }}">{{ $node->description->title }}</a>
            
            @if ($node['children']->isNotEmpty())
                @include('components.submenu', ['tree' => $node['children']])
            @endif
        </li>
    @endforeach
</ul>