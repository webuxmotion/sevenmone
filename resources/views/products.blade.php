@extends('layouts.app')

@section('title', __('messages.products'))

@section('content')
<h1>{{ __('messages.products') }}</h1>

<ul>
    @foreach($products as $product)
    <li>
        <strong>{{ $product->description?->title ?? $product->slug }}</strong><br>
        {{ __('messages.price') }}: {{ $product->price }}<br>
        <img src="{{ asset($product->img) }}" alt="{{ $product->slug }}" width="100">
        <p>{{ $product->description?->exerpt }}</p>
    </li>
    @endforeach
</ul>
@endsection