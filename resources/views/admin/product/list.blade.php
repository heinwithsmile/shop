@extends("admin.layouts.master")
@section('title', 'Furniture Store | Product List')
@section('content')
{{-- @include('components.header')
@include('components.hero')
@include('components.category')
@include('components.new-product')
@include('components.promotion')
@include('components.blog')
@include('components.footer') --}}
<table>
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Category ID</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Stock</th>
            <th>Price</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->product_id}}</td>
            <td><a href="{{route('product.show', ['product'=>$product->id])}}">{{$product->name}}</a></td>
            <td>{{$product->category_id ?? "NULL"}}</td>
            <td>{{$product->description}}</td>
            <td><img src="{{asset($product->photo)}}" alt="product image" width="150" height="150"></td>
            <td>{{$product->stock ?? "NULL"}}</td>
            <td>{{$product->price}}</td>
        </tr>
        @endforeach
</table>
@endsection