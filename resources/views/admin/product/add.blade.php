@extends('admin.layouts.master')
@section('title', 'Add | Furniture Store')
@section('page-name')
    Add Product
@endsection
@section('content')
    <section>
        <div class="container my-5">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div id="image" class="dropzone dz-clickable">
                    <div class="dz-message needsclick">
                        <br>Drop files here or click to upload.
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">category</label>
                    <select class="form-control" name="category_id" id="category">
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
                    <input type="text" class="form-control" name="price" id="price">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <a class="btn btn-warning" href="{{ url()->previous() }}">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Publish" class="publish-btn">
            </form>
        </div>
    </section>
@endsection
