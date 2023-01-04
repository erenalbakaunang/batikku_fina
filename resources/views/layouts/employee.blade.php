<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

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

        <!-- Offcanvas Menu Begin -->
        <!-- <div class="offcanvas-menu-overlay"></div>
        <div class="offcanvas-menu-wrapper">
            <div class="offcanvas__nav__option">
                <a href="#" class="search-switch"><img src='resources/img/icon/search.png' alt=""></a>
                <a href="#"><img src="resources/img/icon/cart.png" alt=""> <span>0</span></a>
            </div>
        </div> -->
        <!-- Offcanvas Menu End -->

        <!-- Header Section Begin -->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="header__logo">
                            <a href="./index.html"><img src="{{Vite::asset('resources/img/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <nav class="header__menu mobile-menu">
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="header__nav__option">
                            <a href="#"><img src="{{Vite::asset('resources/img/icon/profil.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </header>
        <!-- Header Section End -->

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            </div>
        </div>

        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <h6 class="text_acompany">A Company by:</h6> 
                        
                            <div class="footer__logo">
                                <a href="#"><img src="{{Vite::asset('resources/img/logo1.png')}}" alt=""></a>
                            </div>
                            <p>Batikku Company</p>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                        <div class="footer__widget">
                            <h6>Social Media</h6>
                            <ul>
                                <li><a href="#">Batikku</a></li>
                                <li><a href="#">087684321345</a></li>
                                <li><a href="#">Batikku@gmail.co.id</a></li>
                            </ul>
                        </div>
                    </div>
            </div>
        </footer>
        <!-- Footer Section End -->

    </body>
</html>
