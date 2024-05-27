@extends('layouts.master')
@section('title')
    Shop | Furniture Store
@endsection
@push('styles')
    <style>
        .wrapper {
            display: flex;
            max-width: 100%;
            position: relative;
            margin: 0;
            padding: 0;
            justify-content: center;
            background-color: white;
        }

        .wrapper i {
            top: 50%;
            height: 44px;
            width: 44px;
            color: var(--primary-text);
            cursor: pointer;
            font-size: 1.15rem;
            position: absolute;
            text-align: center;
            line-height: 44px;
            background: var(--accent-color);
            transform: translateY(-50%);
        }

        .wrapper i:first-child {
            left: 20px;
            z-index: 2;
            background: #fff;
        }

        .wrapper i:last-child {
            right: 20px;
            background: #fff;
        }

        .wrapper .carousel {
            overflow: hidden;
            white-space: nowrap;
            scroll-behavior: smooth;
        }

        .carousel.dragging {
            cursor: grab;
            scroll-behavior: auto;
        }

        .carousel.dragging img {
            pointer-events: none;
        }

        .carousel .card {
            position: relative;
            display: inline-block;
            width: calc(100% / 3);
            height: 340px;
        }

        .carousel img {
            width: 100%;
            height: 340px;
            object-fit: cover;
            user-select: none;
        }

        .filter-bar {
            display: flex;
            justify-content: space-between;
        }

        .dropdown {
            display: flex;
        }

        .product-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(285px, 1fr));
            grid-gap: 20px;
            align-items: stretch;
        }

        .product-card .img-card {
            height: 330px;
            background-color: var(--secondary-color);
        }

        .product-card img {
            width: 100%;
        }

        .product-card a {
            color: var(--black);
        }
    </style>
@endpush
@section('content')
    <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <div class="carousel">
            <div class="card">
                <img src="{{ asset('storage/frontend/images/slider/slider-img1.jpg') }}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{ asset('storage/frontend/images/slider/slider-img2.jpg') }}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{ asset('storage/frontend/images/slider/slider-img3.jpg') }}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{ asset('storage/frontend/images/slider/slider-img4.jpg') }}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{ asset('storage/frontend/images/slider/slider-img5.jpg') }}" alt="img" draggable="false">
            </div>
        </div>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
    <div class="container">
        <div class="breadcrumbs my-2">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
            </ul>
        </div>
        <h2 class="page-name my-2">SHOP</h2>
        <div class="filter-bar">
            <div class="per-page">
                <p>view per page</p>
            </div>
            <div class="dropdown">
                <form action="" method="get">
                    <select name="category" id="category" onchange="this.form.submit();">
                        <option value="">CATEGORIES</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
                <select name="price" id="price">
                    <option value="">PRICE</option>
                    <option value="">High To Low
                    </option>
                    <option value="">Low To High
                    </option>
                </select>
                <select name="color" id="color">
                    <option value="">COLOR</option>
                    <option value=""></option>
                </select>
                <select name="material" id="material">
                    <option value="">MATERIAL</option>
                    <option value=""></option>
                </select>
                <select name="sort" id="sort">
                    <option value="">SORT BY LATEST</option>
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="product-gallery">
            @foreach ($products as $product)
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
                    <p class="my-1"><a href="{{ route('shop.detail', $product->id) }}">{{ $product->name }}</a></p>
                    <p><a href="#">${{ $product->price }}</a></p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const carousel = document.querySelector(".wrapper .carousel");
        images = carousel.querySelectorAll("img");
        firstImg = carousel.querySelectorAll("img")[0];
        hiddenItems = document.querySelectorAll(".hidden");
        arrowIcons = document.querySelectorAll(".wrapper i");

        let isDragStart = false,
            isDragging = false,
            prevPageX, prevScrollLeft, positionDiff;

        const showHideIcons = () => {
            // showing and hiding prev/next icon according to carousel scroll left value
            let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
            arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
            arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
        }

        arrowIcons.forEach(icon => {
            icon.addEventListener("click", () => {
                let firstImgWidth = firstImg.clientWidth +
                    14; // getting first img width & adding 14 margin value
                // if clicked icon is left, reduce width value from the carousel scroll left else add to it
                carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
                setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
            });
        });

        const autoSlide = () => {
            // if there is no image left to scroll then return from here
            if (carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0)
                return;

            positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
            let firstImgWidth = firstImg.clientWidth + 14;
            // getting difference value that needs to add or reduce from carousel left to take middle img center
            let valDifference = firstImgWidth - positionDiff;

            if (carousel.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
                return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
            }
            // if user is scrolling to the left
            carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
        }

        const dragStart = (e) => {
            // updatating global variables value on mouse down event
            isDragStart = true;
            prevPageX = e.pageX || e.touches[0].pageX;
            prevScrollLeft = carousel.scrollLeft;
        }

        const dragging = (e) => {
            // scrolling images/carousel to left according to mouse pointer
            if (!isDragStart) return;
            e.preventDefault();
            isDragging = true;
            carousel.classList.add("dragging");
            positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
            carousel.scrollLeft = prevScrollLeft - positionDiff;
            showHideIcons();
        }

        const dragStop = () => {
            isDragStart = false;
            carousel.classList.remove("dragging");

            if (!isDragging) return;
            isDragging = false;
            autoSlide();
        }

        const showItem = (index) => {
            // Access your hidden items array and modify the specific item you want
            hiddenItems[index].classList.remove("hidden");
            hiddenItems[index].classList.add("show");
        }

        carousel.addEventListener("mousedown", dragStart);
        carousel.addEventListener("touchstart", dragStart);

        document.addEventListener("mousemove", dragging);
        carousel.addEventListener("touchmove", dragging);

        document.addEventListener("mouseup", dragStop);
        carousel.addEventListener("touchend", dragStop);
    </script>
@endpush
