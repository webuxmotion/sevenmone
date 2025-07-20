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
                            <label class="input-group-text" for="input-sort">{{ __('catalog.sort_by') }}:</label>
                            <select class="form-select" id="input-sort" onchange="location = this.value;">
                                @php
                                    $currentSort = request('sort');
                                @endphp

                                <option value="{{ request()->url() }}" @selected(empty($currentSort))>
                                    {{ __('catalog.default') }}
                                </option>

                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}"
                                    @selected($currentSort === 'name_asc')>
                                    {{ __('catalog.name_asc') }}
                                </option>

                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}"
                                    @selected($currentSort === 'name_desc')>
                                    {{ __('catalog.name_desc') }}
                                </option>

                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}"
                                    @selected($currentSort === 'price_asc')>
                                    {{ __('catalog.price_asc') }}
                                </option>

                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}"
                                    @selected($currentSort === 'price_desc')>
                                    {{ __('catalog.price_desc') }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="input-limit">{{ __('catalog.show') }}:</label>
                            <select class="form-select" id="input-limit">
                                <option selected>15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
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
