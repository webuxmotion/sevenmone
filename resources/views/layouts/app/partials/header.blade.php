<header>
    <div class="header-top py-3">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col">
                    <a href="tel:444">
                        <span class="icon-phone">&#9743;</span> 095 134 33 38
                    </a>
                </div>
                <div class="col text-end icons">
                    <form action="{{ localized_url('/search') }}">
                        <div class="input-group" id="search">
                            <input type="text" class="form-control" placeholder="{{ __('search.search') }}" name="s">
                            <button class="btn close-search" type="button"><i class="fas fa-times"></i></button>
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <a href="#" class="open-search"><i class="fas fa-search"></i></a>

                    <a href="#" class="relative js-show-modal" data-bs-toggle="modal" data-bs-target="#cart-modal">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-danger rounded-pill count-items js-count-items">
                            {{ $cartCount }}
                        </span>
                    </a>
                    
                    @include('layouts.app.partials.cart_modal')

                    <a href="{{ localized_url("/wishlist")}}"><i class="far fa-heart"></i></a>

                    <div class="dropdown d-inline-block">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="far fa-user"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Login</a></li>
                            <li><a class="dropdown-item" href="#">Register</a></li>
                        </ul>
                    </div>

                    <div class="dropdown d-inline-block">
                        <x-lang-switcher />
                    </div>
                </div>
            </div>
        </div>
    </div><!-- header-top -->

    <div class="header-bottom py-2">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid p-0">
                    <a class="navbar-brand" href="{{ localized_url('/') }}">SEVENMONE</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <x-menu />

                </div>
            </nav>
        </div>
    </div><!-- header-bottom -->
</header>