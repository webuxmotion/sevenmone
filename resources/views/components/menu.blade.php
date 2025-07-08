<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @foreach ($tree as $node)
            @if ($node['children']->isNotEmpty())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $node->description->title }}
                    </a>
                    
                    @include('components.submenu', ['tree' => $node['children']])
                </li>
            @else
                 <li class="nav-item">
                    <a class="nav-link" href="{{ localized_url("/category/$node->slug") }}">{{ $node->description->title }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div>