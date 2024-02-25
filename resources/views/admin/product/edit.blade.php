@extends('admin.layouts.master')
@section('content')
    <div class="add-product-container">
        <div class="add-product-heading">
            <div class="add-product-heading-left">
                <h3>Edit Product</h3>
            </div>

            <div class="add-product-heading-right">
                <div class="noti-bell">
                    <img src="./icons/noti_bell.png" alt="">
                    <span></span>
                </div>

                <img src="{{ asset('storage/backend/images/profile.png') }}" alt="">
            </div>
        </div>

        <!-- add-image -->
        <div class="add-image-container">
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="add-image">
                    <input type="file" name="photo" id="photo">
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="product-detail">
                    <div class="input product-name form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" value="{{old('name') ?? $product->name}}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input cartagory form-group">
                        <label for="category">category</label>
                        <select name="category_id" id="category">
                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                        <input type="text" name="price" id="price">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input Description form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
        </div>
    </div>

    <div class="add-product-btn form-group">
        <button class="cancel-btn"><a href="{{url()->previous()}}">Cancel</a></button>
        <input type="submit" value="Update" class="publish-btn">
    </div>
    </form>
@endsection