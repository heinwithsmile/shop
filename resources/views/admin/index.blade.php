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
                    <h3 class="fs-2">${{\App\Models\Order::getTotalSale() }}</h3>
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
@endsection
@push('scripts')
@endpush
