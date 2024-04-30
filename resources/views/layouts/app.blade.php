<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/backend/app.css">
    @stack('styles')
    <!-- Scripts -->
</head>

<body>
    @guest
    @else
        <div class="wrapper">
            @include('admin.layouts.sidebar')
            <div class="main p-3">
                <div id="page-content-wrapper">
                    <div class="heading p-3 d-flex justify-content-between align-items-center">
                        <h4 class="m-0">@yield('page-name')</h4>
                        <div class="profile">
                            <a href="#">
                                <img src="{{ asset('storage/backend/images/profile.png') }}">
                            </a>
                        </div>
                    </div>
                        {{-- <div class="collapse navbar-collapse mx-5" id="navbarSupportedContent">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div> --}}
                    </nav>
                    @endguest
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- JavaScript  --}}
        <script src="/js/backend/script.js"></script>
        @stack('scripts')
    </body>

    </html>
