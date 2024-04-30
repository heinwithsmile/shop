@extends("layouts.app")
@section('title', 'Furniture Store | Detail')
@section('content')
<a href="{{url()->previous()}}">Back</a>
<table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category ID</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Stock</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->category_id ?? "NULL"}}</td>
            <td>{{$product->description}}</td>
            <td><img src="{{asset($product->photo)}}" alt="product image" width="150" height="150"></td>
            <td>{{$product->stock ?? "NULL"}}</td>
            <td>{{$product->price}}</td>
        </tr>
</table>
@endsection