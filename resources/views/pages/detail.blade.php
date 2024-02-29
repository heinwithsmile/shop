@extends('layouts.master')
@push('frontend-styles')
    <style>
        .detail-nav {
            margin-top: 100px;
            margin-left: 50px;
        }

        .detail-nav a {
            text-decoration: none;
            padding-right: 10px;
        }

        .item-detail {
            margin: 50px 50px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(1, 1fr);
            gap: 100px;
        }

        .sm-img img {
            width: 150px;
            height: 150px;
            opacity: 0.5;
        }

        .detail-btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .detail-btn button {
            padding: 10px 20px;
            background-color: black;
            color: white;
        }

        .detail-btn p {
            border: 1px solid black;
            width: 30px;
            height: 30px;
            padding-right: 10px;
        }

        .detail-btn input {
            width: 50px;
            height: 35px;
        }

        .detail-grid {
            margin-top: 50px;
            gap: 30px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            padding: 0 100px;
            background: white;
            padding-bottom: 100px;
            text-align: center;
        }

        .grid-item-3 span {
            background: red;
        }

        .detail-heading {
            text-align: center;
        }

        .product-nav {
            text-align: center;
        }

        .menu {
            margin: 0 50px;
        }

        .text-indent {
            padding-left: 20px;
            font-weight: 100;
        }

        .cutoff-text {
            --max-lines: 2;
            --line-height: 1.4;
            max-height: calc(var(--max-lines) * 1em * var(--line-height));
            line-height: var(--line-height);
            overflow: hidden;
            position: relative;
        }

        .cutoff-text::before {
            content: "";
            position: absolute;
            height: calc(1em * var(--line-height));
            width: 100%;
            bottom: 0;
            pointer-events: none;
            background: linear-gradient(to bottom, transparent, white);
        }

        .expand-btn {
            appearance: none;
            border: 1px solid black;
            padding: .5em;
            border-radius: .25em;
            cursor: pointer;
            margin-top: 1rem;
            justify-content: center;
            display: flex;
            padding: 10px;
            width: 200px;
            background-color: black;
            color: white;
            margin: 0 auto;
        }

        .expand-btn::before {
            content: "SHOW MORE";
        }

        .expand-btn:checked::before {
            content: "COLLAPSE";
        }

        .cutoff-text:has(+ .expand-btn:checked) {
            max-height: none;
        }

        .product-nav button {
            padding: 0 30px;
            position: relative;
        }

        .product-nav button::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 60px;
            width: 50px;
            height: 0.1em;
            background-color: black;
            opacity: 0;
            transition: opacity 300ms, transform 300ms;
        }


        .product-nav button:hover::after,
        .product-nav button:focus::after {
            opacity: 1;
            transform: translate3d(0, 0.2em, 0);
        }

        @media (max-width:768px) {
            .item-detail {
                display: flex;
                flex-direction: column;
            }

            .item-detail .detail-img {
                display: flex;
                justify-content: center;
            }

            .detail-btn {
                margin: 50px 0;
                display: flex;
                justify-content: left;
            }

            .detail-btn button {
                margin: 0 20px;
            }

            .detail-btn p {
                margin: 0 10px;
            }

            .detail-heading {
                margin-top: 50px;
            }

        }

        @media (max-width:426px) {
            .detail-grid {
                margin-top: 50px;
                gap: 30px;
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                grid-template-rows: repeat(4, 1fr);
                padding: 0 100px;
                background: white;
                padding-bottom: 100px;
                text-align: center;
            }

            .detail-nav {
                margin: 20px 20px;
            }

            .detail-img img {
                width: 90%;
            }

            .detail-grid {
                padding: 0 30px;
            }

            .detail-heading {
                font-size: 18px;
            }
        }

        @media (max-width:347px) {
            .detail-btn button {
                font-size: 10px;
                padding: 0 30px;
            }

            .detail-btn input {
                width: 20%;
            }

            .product-nav button a {
                font-size: 14px;
            }
        }
    </style>
@endpush
@section('content')
    <div class="item-detail">
        @foreach ($product as $item)
        <div class="detail-img">
            <img width="300" height="400" src="{{asset('storage/'. $item->photo ?? $item->photo)}}" alt="">
        </div>
        @endforeach

        <div class="detail-info">
            <h2>Modway Olivia Bed</h2>
            <p class="item-price-detail"><b>$1,200.00</b></p>
            <p class="item-text">
                The All in One Fully Upholstered Shelter Queen Bed upholstered bed is designed to add a contemporary
                flair to many of today's modern homes. The button tufted headboard is inset w/two wings, giving it a
                contemporary shelter feel. Also features a matching low profile tootboard and hinged/folding side rails.
            </p>
            <div class="detail-btn">
                <input type="number">
                <button>ADD TO CART</button>
                <p></p>
                <p></p>
            </div>
            <p>
                SKU: BE-006 <br>
                Categories: Bed <br>
                Tags: theme-sky, upstore, WooCommerce, WordPress
            </p>
            <div class="detail-social-icon">
                <img src="/images/icons/facebook.png" alt="">
                <img src="/images/icons/twitter.png" alt="">
                <img src="/images/icons/pintrest.png" alt="">
                <img src="/images/icons/linkdin.png" alt="">
                <img src="/images/icons/git.png" alt="">

            </div>
        </div>

        <div class="sm-img">
            <img src="/images/Detail/modway olivia bed detail.png" alt="">
            <img src="/images/shop/modwayy.jpg" alt="">
        </div>

    </div>
@endsection
