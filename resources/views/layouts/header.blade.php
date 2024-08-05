<header>
    <div class="top-wrapper">
        <div class="container">
            <div class="top-bar">
                <ul>
                    <li>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-telegram"></i></a>
                    </li>
                </ul>
                <div class="right-corner">
                    <p>Up to 40% off best selling furniture.<span><a href="{{ route('shop') }}">Shop Now</a></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="navbar">
            <div class="sitename">
                <a class="site-name" href="{{ route('index') }}">Furniture Store</a>
            </div>
            <nav>
                <ul class="navigation">
                    <li class="nav-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="nav-item"><a href="{{ route('shop') }}">Shop</a></li>
                    <li class="nav-item"><a href="#">Category</a></li>
                    <li class="nav-item"><a href="#">About Us</a></li>
                    <li class="nav-item"><a href="#">Contact Us</a></li>
                </ul>
            </nav>
            <div class="nav-menu-social flex">
                <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                @php
                    $carts = session('cart');
                    $count = (isset($carts)) ? count($carts) : 0;
                    if($count == 0){
                        $count = '';
                    }
                @endphp
                <a href="{{route('cart')}}"><i class="fa-solid fa-basket-shopping"></i><span>{{$count ?? ''}}</span></a>
                <a href="#"><i class="fa-solid fa-user"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="#" class="sidebar-link d-flex align-items-center"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                </form>
            </div>
        </div>
    </div>   
</header>