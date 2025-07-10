<table class="table text-start">
    <thead>
        <tr>
            <th scope="col">{{ __('cart.image') }}</th>
            <th scope="col">{{ __('cart.product') }}</th>
            <th scope="col">{{ __('cart.quantity') }}</th>
            <th scope="col">{{ __('cart.price') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($cart['items'] ?? [] as $id => $item)
        <tr>
            <td>
                <a href="{{ localized_url('/products/' . $item['slug']) }}">
                    <img src="{{ $item['img'] ?? '/public/uploads/no_image.jpg' }}" alt="" style="max-width:50px;">
                </a>
            </td>
            <td>
                <a href="{{ localized_url('/products/' . $item['slug']) }}">
                    {{ $item['title'] }}
                </a>
            </td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ number_format($item['price'], 2) }} ₴</td>
            <td>
                <button 
                    onclick="deleteCartItem('{{ $item['id'] }}')" 
                    class="btn-trash"
                >
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">{{ __('cart.empty') ?? 'Your cart is empty' }}</td>
        </tr>
        @endforelse
    </tbody>

    @if(!empty($cart['items']))
    <tfoot>
        <tr>
            <th colspan="2" class="text-end">{{ __('cart.total') }}:</th>
            <th>{{ $cart['quantity'] }}</th>
            <th>{{ number_format($cart['sum'], 2) }} ₴</th>
        </tr>
    </tfoot>
    @endif
</table>
