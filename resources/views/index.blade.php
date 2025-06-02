@extends('layouts.master')
@section('title', 'Home | Shop')
@push('styles')
    <style>
        .top-wrapper {
            background-color: var(--secondary-color);
        }
        /* Hero Slider */
        .slick-prev:before,
        .slick-next:before {
            color: var(--accent-color) !important;
        }

        /* New Product Section */

        #new-product {
            padding-top: 20px;
        }

        #new-product h3 {
            font-size: 24px;
            font-weight: bold;
        }

        .tab-container {
            width: 100%;
            margin: auto;
        }

        .tabs {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .tab-link {
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            background: none;
        }

        .tab-link:hover {
            background-color: var(--accent-color);
            color: var(--white);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .explore span i {
            font-size: 24px;
        }

        .promotion {
            width: 100%;
            height: 371px;
            background-color: var(--lightsalmon);
            background-image: url('{{ Storage::url('frontend/images/brown-couch.png') }}');
            background-repeat: no-repeat;
            /* background-size: 500px 400px; */
            /* background-attachment: fixed; */
            background-position: right;
        }

        .blog {
            width: 100%;
            height: 100vh;
        }
    </style>
@endpush
@section('content')
    <section id="hero">
        <div class="hero-slider">
            @foreach ($banners as $banner)
                <div>
                    <img src="{{ Storage::url($banner->photo) }}" alt="{{ $banner->title }}" width="100%">
                    <div class="slide-content">
                        <h1>{{ $banner->title }}</h1>
                        <p>{{ $banner->description }}</p>
                        <a class="btn btn-primary" href="{{ route('shop') }}">
                            Shop Now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section id="category">
        <div class="container">
            @php
                $classNames = [
                    'card--bg-bisque',
                    'card--bg-darksalmon',
                    'card--bg-moccasin',
                    'card--bg-lightgray',
                    'card--bg-azure',
                ];
            @endphp
            <div class="categories">
                @foreach ($categories as $i => $category)
                    <div class="card {{ $classNames[$i] }}">
                        <div class="cat-info">
                            <h3>{{ $category->name }}</h3>
                            <p></p>
                        </div>
                        <img src="{{ asset("storage/$category->photo") }}" alt=""
                            style="width: 200px; height:200px;">
                    </div>
                @endforeach
            </div>
            <div class="mt-2">
                <a href="#">Explore More <span></span></a>
            </div>
        </div>
    </section>
    <section id="new-product">
        <div class="container">
            <h3 class="text-center">NEW PRODUCTS</h3>
            <div class="tab-container">
                <div class="tabs">
                    @foreach ($products_categories as $category)
                        <button class="tab-link"
                            onclick="openTab(event, '{{ $category->name }}')">{{ $category->name }}</button>
                    @endforeach
                </div>
                @foreach ($products_categories as $category)
                    <div id="{{ $category->name }}" class="tab-content">
                        @foreach ($category->products as $product)
                            @php
                                $images = $product->images;
                                $image = $images[0] ?? null;
                            @endphp
                            <div class="product-card">
                                @if($image)
                                    <img src="{{ Storage::url($image->photo) }}" alt="{{ $product->name }}"
                                        class="product-image">
                                @endif
                                <p class="my-1"><a
                                        href="{{ route('shop.detail', $product->id) }}">{{ $product->name }}</a>
                                </p>
                                <p><a href="#">${{ $product->price }}</a></p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="promotion" class="mt-2">
        <div class="container">
            <div class="promotion">

            </div>
        </div>
    </section>
    <section id="blog">
        <div class="container">
            <div class="blog">

            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        function openTab(event, tabName) {
            var i, tabContent, tabLinks;

            tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
            }

            tabLinks = document.getElementsByClassName("tab-link");
            for (i = 0; i < tabLinks.length; i++) {
                tabLinks[i].className = tabLinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "flex";
            event.currentTarget.className += " active";
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector('.tab-link').click();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.hero-slider').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                arrows: true,
            });
        });
    </script>
@endpush
