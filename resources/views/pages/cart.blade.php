@extends('layouts.master')
@section('content')
    <table id="cart" class="table table-bordered table-hover table-condensed mt-3">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
            </tr>
        </thead>
        <tbody>

            <?php $total = 0; ?>

            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    <?php $total += $details['price'] * $details['quantity']; ?>

                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="50"
                                        height="" class="img-responsive" />

                                </div>

                                <div class="col-sm-9">
                                    <p class="nomargin">{{ $details['name'] }}</p>
                                    <p class="remove-from-cart cart-delete" data-id="{{ $id }}" title="Delete">
                                        Remove</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    </tr>
                @endforeach
            @endif

        </tbody>
        <tfoot>
            @if (!empty($details))
                <tr class="visible-xs">
                    <td class="text-right" colspan="2"><strong>Total</strong></td>
                    <td class="text-center"> ${{ $total }}</td>
                </tr>
            @else
                <tr>
                    <td class="text-center" colspan="3">Your Cart is Empty.....</td>
                <tr>
            @endif
        </tfoot>

    </table>
    <a href="{{route('shop')}}" class="btn shopping-btn">Continue Shopping</a>
    <a href="#" class="btn btn-warning check-btn">Proceed Checkout</a>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.add-to-cart-button').on('click', function() {
                var productId = $(this).data('product-id');

                $.ajax({
                    type: 'GET',
                    url: '/add-to-cart/' + productId,
                    success: function(data) {
                        $("#adding-cart-" + productId).show();
                        $("#add-cart-btn-" + productId).hide();
                    },
                    error: function(error) {
                        console.error('Error adding to cart:', error);
                    }
                });
            });
        });
    </script>
@endpush
