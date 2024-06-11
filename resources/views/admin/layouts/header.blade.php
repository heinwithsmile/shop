@guest
@else
<div class="wrapper">
@include('admin.layouts.sidebar')
<div class="main p-3">
<div id="page-content-wrapper">
    <div class="heading p-3 d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="m-0 p-2">@yield('page-name')</h4>
            <a class="home p-2" href="{{route('index')}}"><i class="lni lni-home"></i></a>
        </div>
        <div class="profile">
            <a href="{{route('admin.profile')}}">
                <img src="{{ asset('storage/backend/images/profile.png') }}">
            </a>
        </div>
    </div>
@endguest
