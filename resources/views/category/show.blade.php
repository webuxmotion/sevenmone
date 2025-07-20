@extends('layouts.app')

@section('title', __('messages.category_page'))

@section('content')

    <x-breadcrumbs :title="$category->description->title" />

    <section class="featured-products">
        <div class="container">

            <div class="row">

                <div class="col-12">
                    <h3 class="section-title">{{ __('messages.category_products') }}: {{ $category->description->title }}
                    </h3>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="input-sort">Сортировка:</label>
                            <select class="form-select" id="input-sort">
                                <option selected>По умолчанию</option>
                                <option value="1">Название (А - Я)</option>
                                <option value="2">Название (Я - А)</option>
                                <option value="3">Цена (низкая > высокая)</option>
                                <option value="3">Цена (высокая > низкая)</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="input-sort">Показать:</label>
                            <select class="form-select" id="input-sort">
                                <option selected>15</option>
                                <option value="1">25</option>
                                <option value="2">50</option>
                                <option value="3">75</option>
                                <option value="3">100</option>
                            </select>
                        </div>
                    </div>
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
