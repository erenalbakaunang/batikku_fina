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
        'resources/js/owl.carousel.min.js', 'resources/js/main.js', 'resources/js/app.js'])
    </head>
    <body>
        <div class="Gcontainer">
            <div class="login">
                {{ $slot }}
            </div>
        </div>

        <div class="right login-right-box">
            <img src="{{Vite::asset('resources/img/loginRegister.png')}}" alt="">
        </div>
    </body>
</html>
