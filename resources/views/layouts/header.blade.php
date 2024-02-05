<nav class="nav-link">
    <ul>
        <li>
            <a href=""><img id="facebook" src="{{asset('storage/frontend/images/facebook.svg')}}" alt="Facebook" /></a>
        </li>
        <li>
            <a href=""><img src="{{asset('storage/frontend/images/instagram.svg')}}" alt="Instagram" /></a>
        </li>
        <li>
            <a href=""><img src="{{asset('storage/frontend/images/youtube.svg')}}" alt="Youtube" /></a>
        </li>
        <li>
            <a href=""><img src="{{asset('storage/frontend/images/telegram-original.svg')}}" alt="Telegram" /></a>
        </li>
    </ul>
    <div>
        <p><img src="{{asset('storage/frontend/images/Mobile-Phone-icon.png')}}" alt="Phone" />+959 555-444-333</p>
    </div>
</nav>
<div class="navbar">
    <div class="first-nav-icon">
        <a href="{{route('home')}}">LOGO</a>
        <a href="{{route('home')}}">Home</a>
        <a href="{{route('shop')}}">Shop</a>
        <div class="dropdown">
            <button class="dropbtn">
                <a href="catagory.html">Catagory</a>
                <img src="{{asset('storage/frontend/images/greater-than-symbol.png')}}" alt="" />
            </button>
            <div class="dropdown-content">
                <div class="row">
                    <h3>CATEGORY ONE</h3>
                    <div class="column">
                        <div>
                            <a href="#">Bed</a>
                            <a href="#">Cabinet</a>
                            <a href="#">Sofa</a>
                            <a href="#">Kitchen</a>
                            <a href="#">Office</a>
                            <a href="#">Chair</a>
                        </div>
                        <div>
                            <a href="#">Bed</a>
                            <a href="#">Cabinet</a>
                            <a href="#">Sofa</a>
                            <a href="#">Kitchen</a>
                            <a href="#">Office</a>
                            <a href="#">Chair</a>
                        </div>
                    </div>
                    <div class="column-2">
                        <img src="{{asset('storage/frontend/images/banner.jpg')}}" alt="" />
                        <br />
                        <img src="{{asset('storage/frontend/images/Rectangle 48.jpg')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
        {{-- <a href="Blog.html">Blog</a> --}}
        <a href="about.html">About Us</a>
        <a href="contact.html">Contact Us</a>
    </div>

    <div class="sec-nav-icon">
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        <a href="">
            <img src="{{asset('storage/frontend/images/search.svg')}}" alt="" />
        </a>
        <a href="">
            <img src="{{asset('storage/frontend/images/user.svg')}}" alt="" />
        </a>
        <a class="cart-img" href="">
            <img src="{{asset('storage/frontend/images/cart.png')}}" alt="" />
            <span>2</span>
        </a>
    </div>
</div>
<div class="hamburger">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</div>
