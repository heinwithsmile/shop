@extends('admin.layouts.master')
@section('title')
    Add Banner | Furniture Store
@endsection
@section('page-name')
    Add Banner
@endsection
@push('styles')
<link rel="stylesheet" href="/css/backend/utilities/form.css">
@endpush
@section('content')
<section>
    <div class="container my-5">
        <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" required>
            </div>
            <a class="btn btn-warning" href="{{ url()->previous() }}">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Publish" class="publish-btn">
        </form>
    </div>
</section>
@endsection
