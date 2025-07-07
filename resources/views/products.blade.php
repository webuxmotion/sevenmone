<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
</head>

<body>
    <h1>Всі продукти</h1>

    <ul>
        @foreach($products as $product)
        <li>
            <strong>{{ $product->slug }}</strong><br>
            Ціна: {{ $product->price }}<br>
            <img src="{{ asset($product->img) }}" alt="{{ $product->slug }}" width="100">

            <h3>{{ $product->category_id }}</h3>
        </li>
        @endforeach
    </ul>
</body>

</html>