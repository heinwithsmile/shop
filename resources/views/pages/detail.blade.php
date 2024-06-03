@extends('layouts.master')
@push('styles')
    <link rel="stylesheet" href="/css/frontend/pages/detail.css">
@endpush
@section('content')
    <div class="container">
        @include('layouts.breadcrumb')
        <div class="detail">
            @foreach ($product as $item)
                @foreach ($item->images as $image)
                <div class="product-image">
                    <img src="{{ asset('storage/' . $image->photo ?? '') }}" alt="Product Photo">
                </div>
                @endforeach
                <div class="specification">
                    <p class="product-name">{{$item->name}}</p>
                    <p class="price my-2">${{$item->price}}</p>
                    <p class="description">{{$item->description}}</p>
                    <a href="{{ route('add-to-cart', ['id' => $item->id]) }}" class="btn my-2">ADD TO CARD</a>
                </div>
            @endforeach
            <div class="related-images">
                <a href="#"><img src="/storage/images/products/noimage.jpg" alt="Photo"></a>
                <a href="#"><img src="/storage/images/products/noimage.jpg" alt="Photo"></a>
            </div>
        </div>
    </div>
@endsection
