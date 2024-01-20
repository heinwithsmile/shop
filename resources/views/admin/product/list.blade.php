@extends('admin.layouts.master')
@section('title', 'Furniture Store | Product List')
@section('content')
    <div class="profile">
        <div class="add-product-heading">
            <div class="add-product-heading-left">
                <h3>Product Management</h3>
            </div>
            <div class="add-product-heading-right">
                <div class="noti-bell">
                    <img src="{{asset('storage/backend/images/icons/noti_bell.png')}}" alt="">
                    <span></span>
                </div>

                <img src="{{asset('storage/backend/images/profile.png')}}" alt="">
            </div>
        </div>
    </div>
    <div class="product-mng-container">
        <div class="product-mng">
            <div class="product-mng-search">
                <input type="text" placeholder="Search...">
                <img src="{{asset('storage/backend/images/icons/search.png')}}" alt="">
            </div>

            <div class="new-product-btn">
                <button><a href="{{}}">New Product</a> <img src="{{asset('storage/backend/images/icons/new_product.png')}}" alt=""></button>
            </div>
        </div>

        <div class="product_table">
            <table>
                <tr>
                    <th>
                        <input type="checkbox" name="" id="">
                    </th>
                    <th>
                        <img src="{{asset('storage/backend/images/icons/sample_image.png')}}" alt="">
                    </th>
                    <th>
                        ID
                    </th>
                    <th>
                        Product Name
                    </th>
                    <th>
                        Catagory
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Stock
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="{{asset('storage/backend/images/plush-paradise sofa.png')}}" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="{{asset('storage/backend/images/icons/action.png')}}" alt=""></a>
                        <img src="{{asset('storage/backend/images/icons/bin.png')}}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="{{asset('storage/backend/images/2024.png')}}" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="{{asset('storage/backend/images/icons/action.png')}}" alt=""></a>
                        <img src="{{asset('storage/backend/images/icons/bin.png')}}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="{{asset('storage/backend/images/20-410x492 1.png')}}" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="{{asset('storage/backend/images/icons/action.png')}}" alt=""></a>
                        <img src="{{asset('storage/backend/images/icons/bin.png')}}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="{{asset('storage/backend/images/2025.png')}}" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="{{asset('storage/backend/images/icons/action.png')}}" alt=""></a>
                        <img src="{{asset('storage/backend/images/icons/bin.png')}}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="{{asset('storage/backend/images/2026.png')}}" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="{{asset('storage/backend/images/icons/action.png')}}" alt=""></a>
                        <img src="{{asset('storage/backend/images/icons/bin.png')}}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="{{asset('storage/backend/images/2027.png')}}" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="{{asset('storage/backend/images/icons/action.png')}}" alt=""></a>
                        <img src="{{asset('storage/backend/images/icons/bin.png')}}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="{{asset('storage/backend/images/2028.png')}}" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="{{asset('storage/backend/images/icons/action.png')}}" alt=""></a>
                        <img src="{{asset('storage/backend/images/icons/bin.png')}}" alt="">
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
