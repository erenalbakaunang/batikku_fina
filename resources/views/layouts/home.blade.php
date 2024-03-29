<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/bootstrap.min.css', 
        'resources/css/font-awesome.min.css', 'resources/css/elegant-icons.css', 
        'resources/css/magnific-popup.css', 'resources/css/nice-select.css', 
        'resources/css/owl.carousel.min.css', 'resources/css/slicknav.min.css', 
        'resources/css/style.css', 'resources/js/app.js', 
        'resources/js/jquery-3.3.1.min.js', 'resources/js/bootstrap.js', 
        'resources/js/jquery.nice-select.min.js', 'resources/js/jquery.nicescroll.min.js', 
        'resources/js/jquery.magnific-popup.min.js', 'resources/js/jquery.countdown.min.js', 
        'resources/js/jquery.slicknav.js', 'resources/js/mixitup.min.js', 
        'resources/js/owl.carousel.min.js', 'resources/js/main.js'])
    </head>

    <body class="font-sans text-gray-900 antialiased">
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Header Section Begin -->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-1">
                        <div class="header__logo">
                            <a href="{{ route('index.home') }}"><img src="{{Vite::asset('resources/img/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="{{ route('index.home') }}">Home</a></li>
                                <li><a href="{{ route('index.about') }}">About Us</a></li>
                            </ul>
                        </nav>
                    </div>

                    @if (Auth::check())
                        <div class="col-lg-8 col-md-8">
                    @else
                        <div class="col-lg-6 col-md-6">
                    @endif
                        <div class="header__nav__option">
                            <div class="search-box col-md-10" style="float: left;">
                                <div class="search-icon">
                                    <i class="fa fa-regular fa-magnifying-glass"></i>
                                </div>
                                <div class="search-input w-full">
                                    <form method="POST" action="{{ route('index.search') }}" style="margin: 0;">
                                        @csrf

                                        <input type="text" name="keyword" class="input w-full" value="{{ Request::get('keyword') }}" placeholder="Search Product" />
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2" style="float: left; padding: 15px 0;">
                                <!-- <a href="#" class="search-switch"><img src="{{Vite::asset('resources/img/icon/search.png')}}" alt=""></a> -->
                                <a href="{{ route('index.cart') }}"><img src="{{Vite::asset('resources/img/icon/cart.png')}}" alt=""> </a>
                                @if (Auth::check())
                                    <a href="{{ route('index.profile') }}"><img src="{{Vite::asset('resources/img/icon/profil.png')}}" alt=""> </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if (!Auth::check())
                        <div class="col-lg-2 col-md-2">
                            <div class="mt-4 pt-1">
                                <a class="btn btn-sm btn-dark pr-3 pl-3" style="color: white;" href="{{ route('login') }}" target="_blank">LOGIN</a>
                                <a class="btn btn-sm btn-dark pr-2 pl-2" style="color: white;" href="{{ route('register') }}" target="_blank">REGISTER</a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </header>
        <!-- Header Section End -->

        {{ $slot }}

        <!-- Footer Section Begin -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <h6 class="text_acompany">A Company by:</h6> 
                        
                            <div class="footer__logo">
                                <a href="{{ route('index.home') }}"><img src="{{Vite::asset('resources/img/logo1.png')}}" alt=""></a>
                            </div>
                            <p>Batikku Company</p>
                            <!-- <a href="#"><img src="img/payment.png" alt=""></a> -->
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                        <div class="footer__widget">
                            <h6>Social Media</h6>
                            <ul>
                                <li><a href="{{ route('index.home') }}">Batikku</a></li>
                                <li><a href="#">087684321345</a></li>
                                <li><a href="#">Batikku@gmail.co.id</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Search Begin -->
        <!-- <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">+</div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div> -->
        <!-- Search End -->
    </body>
</html>
