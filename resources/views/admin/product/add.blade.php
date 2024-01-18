@extends('admin.layouts.master')
@section('main-content')
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

            <img src="./images/profile.png" alt="">
        </div>
    </div>


    <!-- add-image -->
    <div class="add-image-container">
        <div class="add-image">
            <h4>Add Images</h4>
            <div class="sample-img-lg">
                <img src="./icons/sample_image.png" alt="">
                <p>Browse Image</p>
            </div>

            <div class="smalple-img-sm">
                <img src="./icons/sample_image.png" alt="">
                <p>smaple-image.jpg <br> 234 KB </p>
                <img id="cancle-btn" src="./icons/cancle_button.png" alt="">
            </div>
            <div class="smalple-img-sm">
                <img src="./icons/sample_image.png" alt="">
                <p>smaple-image.jpg <br> 234 KB </p>
                <img id="cancle-btn" src="./icons/cancle_button.png" alt="">
            </div>
            <div class="smalple-img-sm">
                <img src="./icons/sample_image.png" alt="">
                <p>smaple-image.jpg <br> 234 KB </p>
                <img id="cancle-btn" src="./icons/cancle_button.png" alt="">
            </div>
        </div>


        <div class="product-detail">
            <div class="input product-name">
                <label for="name">Product Name</label>
                <input id="name" type="text">
            </div>
            <div class="input cartagory">
                <label for="catagory">Catagory</label>
                <select name="" id="catagory">
                    <option value="">Bed</option>
                    <option value="">Sofa</option>
                    <option value="">Chair</option>
                    <option value="">Lamp</option>

                </select>
            </div>
            <div class="input price">
                <label for="price">Price</label>
                <input id="price" type="text">
            </div>
            <div class="input Description">
                <label for="description">Description</label>
                <textarea name="" id="description"></textarea>
            </div>
            <h3 class="tags-heading">Tags</h3>
            <div class="tags-container">

                <div class="tags" id="tag-blue">
                    <p>Cabinet</p>
                    <img src="./icons/cancle_button.png" alt="">
                </div>
                <div class="tags">
                    <p>Sofa</p>
                    <img src="./icons/cancle_button.png" alt="">
                </div>
                <div class="tags">
                    <p>Kitchen</p>
                    <img src="./icons/cancle_button.png" alt="">
                </div>
                <div class="tags">
                    <p>Table</p>
                    <img src="./icons/cancle_button.png" alt="">
                </div>
                <div class="tags">
                    <p>Bed</p>
                    <img src="./icons/cancle_button.png" alt="">
                </div>
                <div class="tags">
                    <p>Chair</p>
                    <img src="./icons/cancle_button.png" alt="">
                </div>
            </div>

        </div>
    </div>
</div>

<div class="add-product-btn">
    <button class="cancle-btn">Cancle</button>
    <button class="publish-btn">Publish Product</button>
</div>
@endsection