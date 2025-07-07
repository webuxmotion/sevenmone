<div class="container-fluid my-carousel">

    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            @foreach ($slides as $index => $slide)
            <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="{{ $index }}"
                class="{{ $index === 0 ? 'active' : '' }}"
                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $index + 1 }}">
            </button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($slides as $index => $slide)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="slider-content">
                    <h2>{{ $slide->description->title ?? '' }}</h2>
                    <p>{{ $slide->description->description ?? '' }}</p>
                    <a href="{{ localized_url($slide->link) }}">
                        {{ $slide->description->button_title ?? __('messages.learn_more') }}
                    </a>
                </div>
                <img src="{{ asset($slide->image) }}" class="d-block w-100" alt="">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


</div>