@extends('layouts.master')
@section('title')
    Home | Furniture Store
@endsection
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
                        <h3>{{$category->name}}</h3>
                        <p></p>
                    </div>
                    <img src="{{ asset("storage/$category->photo") }}" alt="" style="width: 200px; height:200px;">
                </div>
            @endforeach
        </div>
        <a href="#">Explore More</a>
    </div>
@endsection
@push('scripts')
    <script>

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
    </script>
@endpush
