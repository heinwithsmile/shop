@extends('admin.layouts.master')
@push('styles')
    <link rel="stylesheet" href="/css/backend/utilities/form.css">
@endpush
@section('title', 'Edit | Furniture Store')
@section('page-name')
    Edit Product 
@endsection
@section('content')
<div class="main-content">
    <div class="container my-5">
        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input class="form-control" type="file" name="photo" id="photo">
                <img width="200" height="230" src="{{ $product->photo ? asset('storage/' . $product->photo) : '' }}"
                    alt="" />
                @error('photo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Product Name</label>
                <input class="form-control" type="text" name="name" id="name"
                    value="{{ old('name') ?? $product->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">category</label>
                <select class="form-control" name="category_id" id="category">
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" type="text" name="price" id="price" value="{{ old('price') ?? $product->price }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description">{{ old('description') ?? $product->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <a class="btn btn-warning" href="{{ url()->previous() }}">Cancel</a>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
