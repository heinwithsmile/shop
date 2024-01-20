@extends('layouts.master')
@section('content')
    <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <div class="carousel">
            <div class="card">
                <img src="{{asset('storage/frontend/images/slider/slider-img1.jpg')}}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{asset('storage/frontend/images/slider/slider-img2.jpg')}}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{asset('storage/frontend/images/slider/slider-img3.jpg')}}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{asset('storage/frontend/images/slider/slider-img4.jpg')}}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{asset('storage/frontend/images/slider/slider-img5.jpg')}}" alt="img" draggable="false">
            </div>
        </div>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
@endsection
