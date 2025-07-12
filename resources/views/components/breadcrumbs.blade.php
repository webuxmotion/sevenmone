<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2">
            <li class="breadcrumb-item">
                <a href="{{ localized_url('/') }}"><i class="fas fa-home"></i></a>
            </li>
            @foreach ($breadcrumbs as $crumb)
                @if ($loop->last && !$crumb['url'])
                    <li class="breadcrumb-item active" aria-current="page">{{ $crumb['label'] }}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a></li>
                @endif
            @endforeach
        </ol>
    </nav>
</div>