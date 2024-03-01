@extends('layouts.master')
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
    <div class="shop-nav-heading">
        <div class="mini-heading">
            <p>Home</p>
            <p>Shop</p>
        </div>

        <p id="shop">SHOP</p>
    </div>

    <div class="shop-nav">
        <div class="shop-nav-left">
            <p>view <b>16</b> per page</p>
        </div>

        <div class="shop-nav-right">
            <div class="shop-dropdown">
                <button class="shop-dropbtn">CATAGORIES <img src="images/greater-than-symbol.png" alt=""></button>
                <div class="shop-dropdown-content">
                @php
                    $count = 0;
                @endphp
                @foreach ($categories as $category)
                    <a href="{{route('shop')}}?category={{$category->name}}">{{$category->name}} ({{$cat_count[$count]}})</a>
                    @php
                        $count++;
                    @endphp
                @endforeach
                </div>
            </div>
            <div class="shop-dropdown">
                <button class="shop-dropbtn">PRICE <img src="images/greater-than-symbol.png" alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="shop-dropdown">
                <button class="shop-dropbtn">COLOR <img src="images/greater-than-symbol.png" alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="shop-dropdown">
                <button class="shop-dropbtn">MATERIAL <img src="images/greater-than-symbol.png" alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="shop-dropdown">
                <button class="shop-dropbtn-last">SORT BY LATEST <img src="images/greater-than-symbol.png"
                        alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        </div>
    </div>

    <!-- shop-product-grid -->
    <div class="shop-product-grid">
        <div id="bed" class="menu">
            @foreach ($products as $product)
            <div class="shop-product-item shop-item-1">
                <a href="{{route('shop.detail', ['id' => $product->id])}}"><img src="{{asset("storage/$product->photo")}}" alt="" />
                    <p>{{$product->name}}</p>
                    <p>${{$product->price}}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="shop-last-section">
        <p>You've viewed 16 or 50 products</p>
        <button>LOAD MORE</button>
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
            console.log(index);
            console.log(hiddenItems[index]);
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
