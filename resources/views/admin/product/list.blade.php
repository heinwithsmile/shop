@extends('layouts.app')
@section('title', 'Furniture Store | Product List')
@push('styles')
@endpush
@section('content')
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
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="" width="100" height="100">
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
@endsection
