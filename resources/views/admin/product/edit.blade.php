@extends('layouts.app')
@section('content')
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="add-image">
            <input type="file" name="photo" id="photo">
            <img width="200" height="230" src="{{ $product->photo ? asset('storage/' . $product->photo) : '' }}"
                alt="" />
            @error('photo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="product-detail">
            <div class="input product-name form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') ?? $product->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="input cartagory form-group">
                <label for="category">category</label>
                <select name="category_id" id="category">
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="input price form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" value="{{ old('price') ?? $product->price }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="input Description form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description">{{ old('description') ?? $product->description }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="add-product-btn form-group">
            <button class="cancel-btn"><a href="{{ url()->previous() }}">Cancel</a></button>
            <input type="submit" value="Update" class="publish-btn">
        </div>
    </form>
@endsection
