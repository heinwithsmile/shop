@extends('admin.layouts.master')
@section('content')
    <div class="add-product-container">
        <div class="add-product-heading">
            <div class="add-product-heading-left">
                <h3>Add Product</h3>
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
            <div class="add-image">
            </div>
            <div class="product-detail">
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="input product-name form-group">
                        <label for="name">Product Name</label>
                        <input type="text" id="name">
                    </div>
                    <div class="input cartagory form-group">
                        <label for="category">category</label>
                        <select name="category" id="category">
                            <option value="">Bed</option>
                            <option value="">Sofa</option>
                            <option value="">Chair</option>
                            <option value="">Lamp</option>
                        </select>
                    </div>
                    <div class="input price form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price">
                    </div>
                    <div class="input Description form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea>
                    </div>
            </div>
        </div>
    </div>

    <div class="add-product-btn form-group">
        <button class="cancle-btn">Cancle</button>
        {{-- <button type="submit" class="publish-btn">Publish</button> --}}
        <input type="submit" value="Publish" class="publish-btn">
    </div>
    </form>
@endsection
