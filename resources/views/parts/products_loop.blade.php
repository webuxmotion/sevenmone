@foreach ($products as $product)
    <div class="col-lg-4 col-sm-6 mb-3">
        <div class="product-card">
            <div class="product-tumb">
                <a href="{{ localized_url('/products/' . $product->slug) }}"><img src="{{ $product->img }}"
                        alt=""></a>
            </div>
            <div class="product-details">
                <h4><a href="{{ localized_url('/products/' . $product->slug) }}">{{ $product->description->title }}</a>
                </h4>
                <p>{{ $product->description->excerpt }}</p>
                <div class="product-bottom-details d-flex justify-content-between">
                    <div class="product-price"><small>${{ $product->old_price }}</small>${{ $product->price }}</div>
                    <div class="product-links">
                        <a class="js-add-to-cart" href="{{ localized_url("/cart/add?id=$product->id") }}"
                            data-id="{{ $product->id }}">
                            <i class="fas fa-shopping-cart"></i></a>
                        <a class="js-add-to-wishlist" href="{{ localized_url("/wishlist/add?id=$product->id") }}"
                            data-id="{{ $product->id }}">
                            <i class="far fa-heart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
