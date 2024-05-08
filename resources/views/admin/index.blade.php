@extends('admin.layouts.master')
@section('title', 'Furniture Store | Dashboard')
@section('page-name')
    Dashboard
@endsection
@push('styles')
@endpush
@section('content')
    <div class="row my-2">
        <form action="{{ route('admin') }}" method="get">
            <label for="start">Start Date:</label>
            <input type="date" name="start" id="start">
            <label for="end">End Date:</label>
            <input type="date" name="end" id="end">
            <input type="submit" value="Filter">
        </form>
    </div>
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded my-card">
                <div>
                    <h3 class="fs-2">${{ \App\Models\Order::getTotalSale() }}</h3>
                    <p class="fs-5">Sales</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded my-card">
                <div>
                    <h3 class="fs-2">4920</h3>
                    <p class="fs-5">Sales</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded my-card">
                <div>
                    <h3 class="fs-2">3899</h3>
                    <p class="fs-5">Delivery</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded my-card">
                <div>
                    <h3 class="fs-2">%25</h3>
                    <p class="fs-5">Increase</p>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="tbl-container bdr">
            <table class="table shadow-sm mt-3 bdr table-custom table-borderless">
                <thead class="table-heading">
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_id}}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->amount }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td class="d-flex align-items-center">
                                <a href="{{ route('order.edit', ['order' => $order->id]) }}">
                                    <i class="lni lni-pencil-alt btn"></i>
                                </a>
                                <form class="d-inline-block" method="POST"
                                    action="{{ route('order.destroy', ['order' => $order->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-transparent">
                                        <i class="lni lni-trash-can btn"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
