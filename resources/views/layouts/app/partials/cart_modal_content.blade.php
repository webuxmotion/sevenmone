<table class="table text-start">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cart['items'] ?? [] as $id => $item)
        <tr>
            <td>
                <a href="{{ localized_url('/products/' . $item['slug']); }}"><img src="{{ $item['img'] ?? '/public/uploads/no_image.jpg' }}" alt="" style="max-width:50px;"></a>
            </td>
            <td><a href="{{ localized_url('/products/' . $item['slug']); }}">{{ $item['title'] }}</a></td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ number_format($item['price'], 2) }} ₴</td>
        </tr>
        @empty
        <tr><td colspan="4">Кошик порожній</td></tr>
        @endforelse
    </tbody>

    @if(!empty($cart['items']))
    <tfoot>
        <tr>
            <th colspan="2" class="text-end">Total:</th>
            <th>{{ $cart['quantity'] }}</th>
            <th>{{ number_format($cart['sum'], 2) }} ₴</th>
        </tr>
    </tfoot>
    @endif
</table>