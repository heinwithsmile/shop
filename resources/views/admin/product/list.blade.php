@extends('admin.layouts.master')
@section('title', 'Furniture Store | Product List')
@push('styles')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.min.css"> --}}
@endpush
@section('content')
    <div class="profile">
        <div class="add-product-heading">
            <div class="add-product-heading-left">
                <h3>Product Management</h3>
            </div>
            <div class="add-product-heading-right">
                <div class="noti-bell">
                    <img src="{{ asset('storage/backend/images/icons/noti_bell.png') }}" alt="">
                    <span></span>
                </div>

                <img src="{{ asset('storage/backend/images/profile.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="product-mng-container">
        <div class="product-mng">
            <div class="new-product-btn">
                <button><a href="{{ route('product.create') }}"><img
                            src="{{ asset('storage/backend/images/icons/new_product.png') }}" alt=""> New Product
                    </a></button>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <table id="product-datatable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" name="" id="">
                    </th>
                    <th>
                        <img src="{{ asset('storage/backend/images/icons/sample_image.png') }}" alt="">
                    </th>
                    <th>
                        ID
                    </th>
                    <th>
                        Product Name
                    </th>
                    <th>
                        Catagory
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Photo
                    </th>
                    <th>
                        Stock
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            @foreach ($products as $product)
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" name="" id="">
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="" width="100"
                                height="100">
                        </td>
                        <td>{{ $product->product_id }}</td>
                        <td><a href="{{ route('product.show', ['product' => $product->id]) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->category_id }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->photo }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <a href="{{ route('product.edit', ['product' => $product->id]) }}">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('product.destroy', ['product' => $product->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button><i class="fa-solid fa-trash" style="color: red"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection

@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.min.js"></script>
    <script>
        // let table = new DataTable('#product-datatable');
        $(document).ready(function() {
            $('#product-datatable').DataTable({
                responsive: true
            });
        });
    </script> --}}
@endpush
