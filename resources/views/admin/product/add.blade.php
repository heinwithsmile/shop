@extends('admin.layouts.master')
@section('title', 'Add | Furniture Store')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
<link rel="stylesheet" href="/css/backend/utilities/product-dropzone.css">
<link rel="stylesheet" href="/css/backend/utilities/form.css">
@endpush
@section('page-name')
    Add Product 
@endsection
@section('content')
<section>
    <div class="container my-5">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="dz-default dz-message dropzone form-group"></div>
            <div class="form-group">
                <input type="file" name="photo" id="photo">
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
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script src="/js/backend/product-dropzone.js"></script>
@endpush
