@extends('layouts.app')

@section('title', __('messages.product_page'))

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Laptops</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $product->description->title }}
            </li>
        </ol>
    </nav>
</div>

<div class="container py-3">
    <div class="row">

        <div class="col-md-4 order-md-2">
            
            <h1>{{ $product->description->title }}</h1>

            <ul class="list-unstyled">
                <li><i class="fas fa-check text-success"></i> In stock</li>
                <li><i class="fas fa-shipping-fast text-muted"></i> Coming soon</li>

                <li>
                    <i class="fas fa-hand-holding-usd"></i>
                    <span class="product-price">
                        <small>$250.00</small> $230.99
                    </span>
                </li>
            </ul>

            <div id="product">
                <div class="input-group mb-3">
                    <input id="input-quantity" type="text" class="form-control" name="quantity" value="1">
                    <button class="btn btn-danger" type="button" id="button-addon2">Buy</button>
                </div>
            </div>

        </div>

        <div class="col-md-8 order-md-1">
            
            <ul class="thumbnails list-unstyled clearfix">
                <li class="thumb-main text-center">
                    <a class="thumbnail" href="img/products/apple_cinema_30.jpg" data-effect="mfp-zoom-in">
                        <img src="img/products/imac_1.jpg" alt="">
                    </a>
                </li>

                <li class="thumb-additional"><a class="thumbnail" href="img/products/1.jpg" data-effect="mfp-zoom-in"><img src="img/products/1.jpg" alt=""></a></li>
                <li class="thumb-additional"><a class="thumbnail" href="img/products/2.jpg" data-effect="mfp-zoom-in"><img src="img/products/2.jpg" alt=""></a></li>
                <li class="thumb-additional"><a class="thumbnail" href="img/products/3.jpg" data-effect="mfp-zoom-in"><img src="img/products/3.jpg" alt=""></a></li>
                <li class="thumb-additional"><a class="thumbnail" href="img/products/4.jpg" data-effect="mfp-zoom-in"><img src="img/products/4.jpg" alt=""></a></li>
            </ul>

            <p>
                {{ $product->description->content }}
            </p>
            
        </div>

    </div>
</div>

@endsection
