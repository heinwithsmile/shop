@extends('admin.layouts.master')
@section('title', 'Furniture Store | Product List')
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
            <div class="product-mng-search">
                <input type="text" placeholder="Search...">
                <img src="{{ asset('storage/backend/images/icons/search.png') }}" alt="">
            </div>

            <div class="new-product-btn">
                <button><a href="{{ route('product.create') }}"><img
                            src="{{ asset('storage/backend/images/icons/new_product.png') }}" alt=""> New Product
                    </a></button>
            </div>
        </div>

        <div class="product_table">
            <table>
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
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <input type="checkbox" name="" id="">
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="" width="100" height="100">
                        </td>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category_id }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->photo }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <a href="{{ route('product.edit', ['product' => $product->id]) }}"><img
                                    src="{{ asset('storage/backend/images/icons/action.png') }}" alt=""></a>
                            <img src="{{ asset('storage/backend/images/icons/bin.png') }}" alt="">
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
