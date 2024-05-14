@extends('layouts.master')
@push('styles')
    <link rel="stylesheet" href="/css/frontend/pages/detail.css">
@endpush
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Bed</a></li>
            </ul>
        </div>
        <div class="detail">
            @foreach ($product as $item)
            <div class="product-image">
                <img src="{{asset('storage/'. $item->photo ?? $item->photo)}}" alt="Product Photo">
            </div>
            @endforeach
            <div class="specification">
                <p class="product-name">Modway Olivia Bed</p>
                <p class="price my-2">$1,200.00</p>
                <p class="description">
                    The All in One Fully Upholstered Shelter Queen Bed upholstered bed is designed to add a contemporary
                    flair to many of today's modern homes. The button tufted headboard is inset w/two wings, giving it a
                    contemporary shelter feel. Also features a matching low profile tootboard and hinged/folding side rails.
                </p>
                <a href="#" class="btn my-2">ADD TO CARD</a>
                <p>
                    SKU: BE-006 <br>
                    Categories: Bed <br>
                    Tags: theme-sky, upstore, WooCommerce, WordPress
                </p>
                <div class="soicial-icons">
                </div>
            </div>
            <div class="related-images">
                <a href="#"><img src="/storage/images/products/noimage.jpg" alt="Photo"></a>
                <a href="#"><img src="/storage/images/products/noimage.jpg" alt="Photo"></a>
            </div>
        </div>
    </div>
@endsection
