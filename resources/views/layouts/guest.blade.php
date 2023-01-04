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
    <!-- <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            </div>
        </div>
    </body> -->

    <body>
        <div class="Gcontainer">
            <div class="login">
                <form action="">
                    <p>Welcome !</p>
                    <h1>Login in to</h1>
                    <!-- <hr> -->
                    <p>Batikku - Batik Fashion Trendy</p>
                    <label for="">Email</label>
                    <input type="text" placeholder="example@gmail.com">
                    <label for="">Password</label>
                    <input type="password" placeholder="Password">
                    <button>Login</button>
                    <p>
                        <a href="#">Forgot Password?</a>
                    </p>
                </form>
            </div>
            <!-- <div class="right">
                <img src="{{Vite::asset('resources/img/loginRegister.png')}}" alt="">
            </div> -->
        </div>
    </body>
</html>
