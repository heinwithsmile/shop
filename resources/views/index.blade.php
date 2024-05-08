@extends('layouts.master')
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
        <div class="categories">
            <div class="card card--bg-bisque">
                <h3>BED</h3>
                <p>70 Products</p>
            </div>
            <div class="card card--bg-darksalmon">
                <h3>SOFA</h3>
                <p>70 Products</p>
            </div>
            <div class="card card--bg-moccasin">
                <h3>LAMP</h3>
                <p>70 Products</p>
            </div>
            <div class="card card--bg-lightgray">
                <h3>CABINET</h3>
                <p>70 Products</p>
            </div>
            <div class="card card--bg-azure">
                <h3>TABLE</h3>
                <p>70 Products</p>
            </div>
            <a href="#">Explore More</a>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const hamburger = document.querySelector(".hamburger");
        const navbar = document.querySelector(".navbar");


        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navbar.classList.toggle("active");

        })

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
