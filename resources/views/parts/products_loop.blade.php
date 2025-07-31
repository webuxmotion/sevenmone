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

                        <span class="wishlist-button js-wishlist-button {{ in_wishlist($product->id) ? 'is-added' : '' }}">

                            <a class="js-delete-from-wishlist delete-from-wishlist"
                                href="{{ localized_url("/wishlist/delete?id=$product->id") }}"
                                data-id="{{ $product->id }}">
                                <i class="fa fa-heart"></i>
                            </a>
                            <a class="js-add-to-wishlist add-to-wishlist"
                                href="{{ localized_url("/wishlist/add?id=$product->id") }}"
                                data-id="{{ $product->id }}">
                                <i class="far fa-heart"></i>
                            </a>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
