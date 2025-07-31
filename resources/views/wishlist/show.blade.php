@extends('layouts.app')

@section('title', __('messages.wishlist_page'))

@section('content')

    <section class="featured-products">
        <div class="container">

            <div class="row">

                @include('parts/products_loop', ['products' => $products])

            </div>
        </div>
    </section>

@endsection
