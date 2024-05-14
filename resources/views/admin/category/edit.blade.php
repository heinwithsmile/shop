@extends('admin.layouts.master')
@push('styles')
    <link rel="stylesheet" href="/css/backend/utilities/form.css">
@endpush
@section('title', 'Edit | Furniture Store')
@section('page-name')
    Edit Category
@endsection
@section('content')
    <section>
        <div class="container my-5">
            <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $category->name }}">
                </div>
                <a class="btn btn-warning" href="{{ url()->previous() }}">Cancel</a>
                <input type="submit" value="Update" class="btn btn-primary">
            </form>
        </div>
    </section>
@endsection