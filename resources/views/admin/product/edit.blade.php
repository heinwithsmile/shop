@extends('admin.layouts.master')
@push('styles')
    <link rel="stylesheet" href="/css/backend/utilities/form.css">
@endpush
@section('title', 'Edit | Furniture Store')
@section('page-name')
    Edit Product
@endsection
@section('content')
    <section>
        <div class="container my-5">
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input class="form-control" type="file" name="photo" id="photo" onchange="previewFile()">
                    @if ($product->photo)
                        <img id="preview" src="{{ Storage::url($product->photo) }}" alt="Current File"
                            style="max-width: 200px; max-height: 200px;">
                    @else
                        <p>No file uploaded.</p>
                    @endif
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
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" name="price" id="price"
                        value="{{ old('price') ?? $product->price }}">
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
    </section>
@endsection
@push('scripts')
    <script>
        function previewFile() {
            const file = document.getElementById('photo').files[0];
            const preview = document.getElementById('preview');
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                preview.src = reader.result;
            }, false);
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
