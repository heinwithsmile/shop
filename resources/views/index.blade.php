@extends('layouts.master')
@section('title')
    Home | Furniture Store
@endsection
@push('styles')
    <style>
        .tab-container {
            width: 100%;
            margin: auto;
        }

        .tabs {
            display: flex;
            justify-content: center;
        }

        .tab-link {
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="hero">
            <div class="mySlides fade">
                <img src="{{ asset('storage/frontend/images/hero.jpg') }}" alt="Slider Photo" />
            </div>

            <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-chevron-left"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fa-solid fa-chevron-right"></i></a>

            <div class="hero-inner">
                <h3>SALE OFF 30%</h3>
                <h1>Classic 2024 Interior Designs</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a class="btn btn-primary" href="{{ route('shop') }}">
                    Shop Now
                </a>
            </div>
        </div>
    </div>
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
                    <img src="{{ asset("storage/$category->photo") }}" alt="" style="width: 200px; height:200px;">
                </div>
            @endforeach
        </div>
        <a href="#">Explore More</a>
    </div>
    <div class="container">
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
                        @endphp
                        <div class="product-card">
                            <div class="img-card">
                                <a href="{{ route('shop.detail', ['id' => $product->id]) }}">
                                    @foreach ($images as $image)
                                        <img src="{{ asset("storage/$image->photo") }}" alt="" />
                                    @endforeach
                                </a>
                            </div>
                            <p class="my-1"><a href="{{ route('shop.detail', $product->id) }}">{{ $product->name }}</a>
                            </p>
                            <p><a href="#">${{ $product->price }}</a></p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    {{-- <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }

        function openMenu(menuItem) {
            var i;
            var x = document.getElementsByClassName("menu");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(menuItem).style.display = "grid";
        }
    </script> --}}
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
@endpush
