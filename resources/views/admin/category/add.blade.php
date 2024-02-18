@extends('admin.layouts.master')
@section('content')
    <div class="add-product-container">
        <div class="add-product-heading">
            <div class="add-product-heading-left">
                <h3>Add Category</h3>
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
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <div class="add-image">
                    <input type="file" name="photo" id="photo">
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
                <input type="text" name="name" id="name">
        </div>
    </div>

    <div class="add-product-btn form-group">
        <button class="cancel-btn"><a href="{{url()->previous()}}">Cancel</a></button>
        <input type="submit" value="Add" class="publish-btn">
    </div>
    </form>
@endsection
