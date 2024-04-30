@extends('layouts.app')
@section('title', 'Furniture Store | Product List')
@section('page-name')
    Product Management
@endsection
@push('styles')
@endpush
@section('content')
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center">
            <div class="p-1 rounded bg-light my-3">
                <form action="{{ route('product.index') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="search" placeholder="Search" aria-describedby="button-addon1"
                            class="form-control border-0 bg-light">
                        <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                    class="lni lni-search-alt"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                <a class="my-btn" href="{{ route('product.create') }}">
                    Add Product
                </a>
            </div>
        </div>
        <div class="tbl-container bdr">
            <table class="table shadow-sm mt-3 bdr table-custom table-borderless">
                <thead class="table-heading">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><a href="{{ route('product.show', ['product' => $product->id]) }}">{{ $product->name }}</a></td>
                            <td>{{ $product->category_id }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->photo }}</td>
                            <td>{{ $product->stock }}</td>
                            <td class="d-flex align-items-center">
                                <a href="{{ route('product.edit', ['product' => $product->id]) }}">
                                    <i class="lni lni-pencil-alt btn"></i>
                                </a>
                                <form class="d-inline-block" method="POST" action="{{ route('product.destroy', ['product' => $product->id]) }}">
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
        {{ $products->links() }}
    </div>
@endsection
