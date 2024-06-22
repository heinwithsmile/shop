@extends('layouts.master')
@section('content')
<div class="container">
    @include('layouts.breadcrumb')
    <form action="{{ route('stripe') }}" method="post">
        @csrf
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
                                    <div class="col-sm-3 hidden-xs">
                                        <img src="{{ $details['photo'] }}" width="50"
                                            height="" class="img-responsive" />
    
                                    </div>
    
                                    <div class="col-sm-9">
                                        <p class="nomargin">{{ $details['name'] }}</p>
                                            <a href="{{route('remove-from-cart', ['id'=>$id])}}">Remove</a>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                            </td>
                            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        </tr>
                        <input type="hidden" name="name" value="{{$details['name']}}">
                        <input type="hidden" name="price" value="{{$details['price']}}">
                        <input type="hidden" name="quantity" value="{{$details['quantity']}}">
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
        <a href="{{ route('shop') }}" class="btn shopping-btn">Continue Shopping</a>
        <button class="btn btn-submit" type="submit">Checkout</button>
    </form>
</div>
@endsection
@push('scripts')
@endpush
