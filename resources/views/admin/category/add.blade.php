@extends('admin.layouts.master')
@section('title')
    Add Category | Furniture Store
@endsection
@section('page-name')
    Add Category
@endsection
@push('styles')
<link rel="stylesheet" href="/css/backend/utilities/form.css">
@endpush
@section('content')
<section>
    <div class="container my-5">
        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <a class="btn btn-warning" href="{{ url()->previous() }}">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Publish" class="publish-btn">
        </form>
    </div>
</section>
@endsection
