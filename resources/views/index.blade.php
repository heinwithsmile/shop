@extends('layouts.master')
@section('content')
    <div class="hero-container">
        <div class="mySlides fade">
            <img src="{{asset('storage/frontend/images/hero-img.jpg')}}" alt="" />
        </div>
        <div class="mySlides fade">
            <img src="{{asset('storage/frontend/images/bluesofa.jpg')}}" alt="" />
        </div>
        <div class="mySlides fade">
            <img src="{{asset('storage/frontend/images/graysofa.jpg')}}" alt="" />
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="hero-container-inner">
            <h3>SALE OFF 30%</h3>
            <h1>Classic 2023 Interior Designs</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="{{route('shop')}}">
                <button>
                    Shop Now <img src="{{asset('storage/frontend/images/right-arrow-svgrepo-com.svg')}}" alt="" />
                </button>
            </a>

        </div>
    </div>

    <div class="hero-grid-container">
        <div class="grid-item item-1">
            <p>
                BED <br />
                70 Products
            </p>
            <a href=""><img src="{{asset('storage/frontend/images/whitebed.png')}}" alt="" /></a>
        </div>
        <div class="grid-item item-2">
            <p>
                SOFA <br />
                50 Products
            </p>
            <a href=""><img src="{{asset('storage/frontend/images/blackchair.png')}}" alt="" /></a>
        </div>
        <div class="grid-item item-3">
            <p>
                LAMP <br />
                30 Products
            </p>
            <a href=""><img src="{{asset('storage/frontend/images/lamp.png')}}" alt="" /></a>
        </div>
        <div class="grid-item item-4">
            <p>
                CABINET<br />
                40 Products
            </p>
            <a href=""><img src="{{asset('storage/frontend/images/cabinet.png')}}" alt="" /></a>
        </div>
        <div class="grid-item item-5">
            <p>
                TABLE<br />
                20 Products
            </p>
            <a href=""><img src="{{asset('storage/frontend/images/table.png')}}" alt="" /></a>
        </div>

        <a href="">
            <p>
                Explore more
                <img src="{{asset('storage/frontend/images/right-arrow-svgrepo-com.svg')}}" alt="" />
            </p>
        </a>
    </div>
@endsection
