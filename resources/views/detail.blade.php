@extends("layouts.app")
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
        <th>Stock</th>
        <th>Price</th>
    </tr>
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->product_id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->category_id}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->stock}}</td>
        <td>{{$product->price}}</td>
    </tr>
</table>
@endsection
