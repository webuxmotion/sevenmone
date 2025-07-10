<div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('cart.cart') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body js-modal-body">
                {{-- Cart items will be loaded here via AJAX --}}
            </div>

            <div class="modal-footer">
                @php
                    $cart = session('cart', ['items' => []]);
                    $isEmpty = empty($cart['items']);
                @endphp

                <button 
                    type="button" 
                    class="btn btn-danger ripple js-clear-cart-button {{ $isEmpty ? 'd-none' : '' }}"
                    onclick="clearCart()"
                >
                    {{ __('cart.clear_cart') }}
                </button>

                <button type="button" class="btn btn-danger ripple" data-bs-dismiss="modal">
                    {{ __('cart.continue_shopping') }}
                </button>

                <a href="{{ localized_url('/cart') }}" class="btn btn-primary">
                    {{ __('cart.checkout') }}
                </a>
            </div>
        </div>
    </div>
</div>
