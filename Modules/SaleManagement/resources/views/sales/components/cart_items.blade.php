<table class="table table-bordered">
    <thead>
        <tr>
            <th>SL</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
             $total = 0;
        @endphp
        @foreach ($carts as $cart)
            <tr id="row_{{ $loop->iteration }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cart->product->name }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>{{ $cart->total_price }}</td>
                <td>
                    <a data-row="#row_{{ $loop->iteration }}" href="{{ route('dashboard.sale-items.cartDelete',$cart->id) }}" class="delete-cart-item">
                        x
                    </a>
                </td>
            </tr>
            @php
                $total = $total + $cart->total_price;
            @endphp
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total</td>
            <td colspan="2">{{  $total }}</td>
        </tr>
    </tfoot>
</table>
