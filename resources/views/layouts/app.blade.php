<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'sixty six lanka')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/style.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- pdf --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
            integrity="sha256-c9vxcXyAG4paArQG3xk6DjyW/9aHxai2ef9RpMWO44A=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- preloader --}}
    {{-- <link href="{{ asset('layouts.preload') }}" rel="stylesheet"> --}}

    {{-- title image --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" sizes="96*96">
</head>
<style>
    .nav_user_profile img{
        background: #c3c3c3;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 5px;
    }
    a.dropdown-item.active{
        background: #293745;
        color: #ffffff !important;
        font-weight: 600;
    }
    a.dropdown-item.active:hover{
        background: #ffffff;
        color: #293745 !important;
    }
</style>
    <body>
        {{-- <div id="preload" class="preload"> --}}
            {{-- @include('layouts.preload') --}}
        {{-- </div> --}}
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="navbar_top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('image/whitelogo.png') }}" alt="tag" width="120px" height="35px">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto" id="myTab">
                            @include('layouts.nav')
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('login')?'active':''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('register')?'active':''}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown nav_user_profile d-flex">
                                    @if (auth()->user()->image)
                                        <img src="{{ asset('users/profile/'.Auth::user()->image) }}" alt="profile Image">
                                    @endif
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle name" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->role == 'admin' && Auth::user()->status == 1)
                                            <a class="dropdown-item {{request()->is('home')?'active':''}}" href="/home">Profile</a>
                                            <a class="dropdown-item {{request()->is('admin')?'active':''}}" href="/admin/">Dashboard</a>
                                        @endif
                                        @if (Auth::user()->role == 'super_admin')
                                            <a class="dropdown-item {{request()->is('home')?'active':''}}" href="/home">Profile</a>
                                            <a class="dropdown-item {{request()->is('superadmin')?'active':''}}" href="/superadmin/">Dashboard</a>
                                        @endif
                                        @if (Auth::user()->role == 'user')
                                            <a class="dropdown-item {{request()->is('home')?'active':''}}" href="/home">Profile</a>
                                            <a class="dropdown-item {{request()->is('preorder')?'active':''}}" href="/preorder/create">Pre Order</a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="container">
                    @include('layouts.message')
                </div>
                @yield('content')
                @guest
                        <div class="caldera_forms_modal" id="btntop" onclick="topFunction">
                            <span class="whats_app">Whatsapp Us</span>
                            <a target="_blank" href="https://wa.me/+9471234567"> <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                @else
                    @if (Auth::user()->role=='user')
                        <div class="caldera_forms_modal" id="btntop" onclick="topFunction">
                            <span class="whats_app">Whatsapp Us</span>
                            <a target="_blank" href="https://wa.me/+9471234567"> <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                    @endif
                @endguest
            </main>
        </div>
        <section>
            @include('layouts.footer')
        </section>
    </body>
</html>
