@extends('admin.layouts.master')
@section('title', 'Product Management | Furniture Store')
@section('page-name')
    Product Management
@endsection
@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div class="p-1 rounded bg-light my-3">
                <form action="{{ route('product.index') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="search" placeholder="Search" aria-describedby="button-addon1"
                            class="form-control border-0 bg-light">
                    </div>
                </form>
            </div>
            <div>
                <a class="my-btn d-flex justify-content-around align-items-center" href="{{ route('product.create') }}">
                    <i class="lni lni-circle-plus"></i> 
                    Add Product
                </a>
            </div>
        </div>
        <div class="table-container tableBorder table-responsive py-5">
            <table class="table shadow-sm mt-3 tableBorder table-custom table-borderless ">
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
                            <td>{{ $product->category->name ?? '' }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->images->first()->photo ?? ''}}</td>
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
        {{ $products->links("vendor.pagination.default") }}
    </section>
@endsection
