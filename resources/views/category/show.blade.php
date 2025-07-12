@extends('layouts.app')

@section('title', __('messages.category_page'))

@section('content')

<x-breadcrumbs :title="$category->description->title" />

<section class="featured-products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title">{{ __('messages.category_products') }}: {{ $category->description->title }}</h3>
            </div>

            @include('parts/products_loop', ['products' => $products])
 
        </div>
    </div>
</section>

@endsection
