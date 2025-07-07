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
                    <form>
                        <div class="input-group" id="search">
                            <input type="text" class="form-control" placeholder="Search..." name="s">
                            <button class="btn close-search" type="button"><i class="fas fa-times"></i></button>
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <a href="#" class="open-search"><i class="fas fa-search"></i></a>

                    <a href="#" class="relative" data-bs-toggle="modal" data-bs-target="#cart-modal">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-danger rounded-pill count-items">0</span>
                    </a>
                    <div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table text-start">
                                        <thead>
                                            <tr>
                                                <th scope="col">Image</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#"><img src="/img/products/apple_cinema_30.jpg" alt=""></a>
                                                </td>
                                                <td><a href="#">Apple cinema</a></td>
                                                <td>1</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#"><img src="/img/products/canon_eos_5d_1.jpg" alt=""></a>
                                                </td>
                                                <td><a href="#">Canon EOS</a></td>
                                                <td>1</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#"><img src="/img/products/hp_1.jpg" alt=""></a>
                                                </td>
                                                <td><a href="#">HP</a></td>
                                                <td>1</td>
                                                <td>100</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger ripple" data-bs-dismiss="modal">Continue Shopping</button>
                                    <button type="button" class="btn btn-primary">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#"><i class="far fa-heart"></i></a>

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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ localized_url('products') }}">{{ __('menu.products') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.html">{{ __('menu.computers') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.html">{{ __('menu.tablets') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('menu.laptops') }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="category.html">{{ __('menu.mac') }}</a></li>
                                    <li><a class="dropdown-item" href="category.html">{{ __('menu.windows') }}</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.html">{{ __('menu.phones') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.html">{{ __('menu.cameras') }}</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
        </div>
    </div><!-- header-bottom -->
</header>