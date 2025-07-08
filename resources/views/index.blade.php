@extends('layouts.app')

@section('title', __('messages.main_page'))

@section('content')

<x-slider />

<section class="featured-products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title">Popular products</h3>
            </div>

            @include('parts/products_loop', ['products' => $hits])
 
        </div>
    </div>
</section>

@endsection