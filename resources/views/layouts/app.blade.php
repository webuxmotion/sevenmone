<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>@yield('title', 'Мій сайт')</title>
</head>

<body>

    <header>
        <div class="header-top py-3">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col">
                        <a href="tel:5551234567">
                            <span class="icon-phone">&#9743;</span> 555 123-45-67
                        </a>
                    </div>
                    <div class="col text-end icons">
                        <form>
                            <div class="input-group" id="search">
                                <input type="text" class="form-control" placeholder="Search..." name="s">
                                <button class="btn close-search" type="button"><i class="fas fa-times"></i></i></button>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table text-start">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Фото</th>
                                                    <th scope="col">Товар</th>
                                                    <th scope="col">Кол-во</th>
                                                    <th scope="col">Цена</th>
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
                                        <button type="button" class="btn btn-danger ripple" data-bs-dismiss="modal">Продолжить покупки</button>
                                        <button type="button" class="btn btn-primary">Оформить заказ</button>
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
                                <li><a class="dropdown-item" href="#">Авторизация</a></li>
                                <li><a class="dropdown-item" href="#">Регистрация</a></li>
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

    <main>
        @yield('content')
    </main>

    <footer>
        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <h4>Информация</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Главная</a></li>
                            <li><a href="#">О магазине</a></li>
                            <li><a href="#">Оплата и доставка</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h4>Время работы</h4>
                        <ul class="list-unstyled">
                            <li>г. Киев, ул. Пушкина, 10</li>
                            <li>пн-вс: 9:00 - 18:00</li>
                            <li>без перерыва</li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h4>Контакты</h4>
                        <ul class="list-unstyled">
                            <li><a href="tel:5551234567">555 123-45-67</a></li>
                            <li><a href="tel:5551234567">555 123-45-68</a></li>
                            <li><a href="tel:5551234567">555 123-45-69</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h4>Мы в сети</h4>
                        <div class="footer-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <button id="top">
        <i class="fas fa-angle-double-up"></i>
    </button>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.css">
    <script src="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js"></script>

    <script src="/js/main.js"></script>

    <!-- Твій main.js -->
    <script src="/js/main.js"></script>

</body>

</html>