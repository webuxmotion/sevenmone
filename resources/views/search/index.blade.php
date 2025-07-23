@extends('layouts.app')

@section('title', __('messages.search_result'))

@section('content')

    <section class="featured-products">
        <div class="container">

            <div class="row">

                <div class="col-12">
                    <h3 class="section-title">{{ __('search.total') }}: {{ $products->total() }}
                    </h3>
                </div>

                @include('parts/products_loop', ['products' => $products])

            </div>

            <div class="row">
                <div class="pagination-wrapper">
                    {{ $products->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>

@endsection
