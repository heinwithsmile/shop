@extends('layouts.master')
@push('styles')
    <link rel="stylesheet" href="/css/frontend/pages/detail.css">
@endpush
@section('content')
    <div class="container">
        @include('layouts.breadcrumb')
        <div class="detail">
            @foreach ($product as $item)
                <div class="product-image">
                    <img src="{{ asset('storage/' . $item->images[0]->photo ?? '') }}" alt="Product Photo">
                </div>
                <div class="specification">
                    <p class="product-name">{{ $item->name }}</p>
                    <p class="price my-2">${{ $item->price }}</p>
                    <p class="description">{{ $item->description }}</p>
                    <a href="{{ route('add-to-cart', ['id' => $item->id]) }}" class="btn my-2">ADD TO CARD</a>
                </div>
                <div class="related-images">
                    @foreach ($item->images as $image)
                        <a href="#">
                            <img src="{{ Storage::url($image->photo ?? '') }}" alt="Photo" width="100">
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
