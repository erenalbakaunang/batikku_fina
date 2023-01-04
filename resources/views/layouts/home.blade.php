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
        <!-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                
            </div>
        </div> -->
        
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Offcanvas Menu Begin -->
        <!-- <div class="offcanvas-menu-overlay"></div>
        <div class="offcanvas-menu-wrapper">
            <div class="offcanvas__nav__option">
                <a href="#" class="search-switch"><img src='resources/img/icon/search.png' alt=""></a>
                <a href="#"><img src="{{Vite::asset('resources/img/icon/cart.png')}}" alt=""> <span>0</span></a>
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
                            <ul>
                                <li><a href="./index.html">Home</a></li>
                                <li><a href="./shop.html">About Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="header__nav__option">
                            <div class="search-box">
                                <div class="search-icon">
                                    <i class="fa-regular fa-magnifying-glass"></i>
                                </div>
                                <div class="search-input">
                                    <input type="text" class="input" placeholder="Search Product">
                                </div>
                            </div>
                            <!-- <a href="#" class="search-switch"><img src="{{Vite::asset('resources/img/icon/search.png')}}" alt=""></a> -->
                            <a href="#"><img src="{{Vite::asset('resources/img/icon/cart.png')}}" alt=""> 
                            <a href="#"><img src="{{Vite::asset('resources/img/icon/profil.png')}}" alt=""> 
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </header>
        <!-- Header Section End -->

        <!-- Hero Section Begin -->
        <section class="hero">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="{{Vite::asset('resources/img/hero.png')}}">
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="filter__controls">
                            <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a><h2><b>New Product Arrivals</b></h2></a></li>
                            </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row product__filter">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{Vite::asset('resources/img/product7.png')}}">
                            </div>
                            <div class="product__item__text">
                                <h6>Blue Blouse Batik Women Flower</h6>
                                <h5>Rp200.000</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{Vite::asset('resources/img/product6.png')}}">
                            </div>
                            <div class="product__item__text">
                                <h6>Brown Lurik Set Women</h6>
                                <h5>Rp195.000</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item sale">
                            <div class="product__item__pic set-bg" data-setbg="{{Vite::asset('resources/img/product5.png')}}">
                            </div>
                            <div class="product__item__text">
                                <h6>Black Batik Women Set Casual</h6>
                                <h5>Rp210.000</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{Vite::asset('resources/img/product4.png')}}">
                            </div>
                            <div class="product__item__text">
                                <h6>Tosca grey Batik Shirt Man</h6>
                                <h5>Rp200.000</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Section End -->

        <!-- Latest Blog Section Begin -->
        <section class="latest spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <!-- <span>Latest News</span> -->
                            <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a><h2>Popular This Week</h2></a></li>
                            </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row product__filter">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{Vite::asset('resources/img/product1.png')}}">
                            </div>
                            <div class="product__item__text">
                                <h6>Cream Blue Blouse Women</h6>
                                <h5>Rp250.000</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{Vite::asset('resources/img/product2.png')}}">
                            </div>
                            <div class="product__item__text">
                                <h6>Blue Blouse Women Modern</h6>
                                <h5>Rp270.000</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item sale">
                            <div class="product__item__pic set-bg" data-setbg="{{Vite::asset('resources/img/product3.png')}}">
                            </div>
                            <div class="product__item__text">
                                <h6>Pink Green Blouse Women</h6>
                                <h5>Rp210.000</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{Vite::asset('resources/img/product4.png')}}">
                            </div>
                            <div class="product__item__text">
                                <h6>Tosca grey Batik Shirt Man</h6>
                                <h5>Rp200.000</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Latest Blog Section End -->

        <!-- Footer Section Begin -->
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
                            <!-- <a href="#"><img src="img/payment.png" alt=""></a> -->
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
