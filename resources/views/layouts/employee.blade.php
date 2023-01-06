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
        @vite(['resources/css/bootstrap.min.css', 'resources/css/style.min.css', 
        'resources/css/employee.css', 'resources/css/font-awesome.min.css',
        'resources/js/sidebarmenu.js', 'resources/js/waves.js', 
        'resources/js/app-style-switcher.js', 'resources/js/custom.js', 
        'resources/js/dashboard1.js', 'resources/js/jquery.min.js', 
        'resources/js/bootstrap.bundle.min.js', 'resources/js/jquery.sparkline.min.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
            data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar" data-navbarbg="skin5">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <a class="navbar-brand" href="dashboard.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="{{Vite::asset('resources/img/logo.png')}}" alt="homepage" />
                            </b>
                    </a>
                
                    <div class="navbar-header" data-logobg="skin6">
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        <!-- <a class="navbar-brand" href="dashboard.html"> -->
                            <!-- Logo icon -->
                            
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <!-- <span class="logo-text">
                                dark Logo text
                                <img src="plugins/images/logo-text.png" alt="homepage" />
                            </span> -->
                        <!-- </a> -->
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                            href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    </div>
                
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav ms-auto d-flex align-items-center">
                            <li>
                                <a class="profile-pic" href="{{ route('pegawai.profile.index') }}">
                                    <img src="{{Vite::asset('resources/img/icon/profil.png')}}" alt="user-img" width="20"
                                        class="img-circle"></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <!-- User Profile-->
                            <li class="sidebar-item pt-2">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('pegawai.produk.index') }}"
                                    aria-expanded="false">
                                        <img src="{{Vite::asset('resources/img/icon/employee/produk.png')}}" width="20">
                                    <span class="hide-menu">&nbsp;&nbsp;&nbsp;Produk</span>
                                </a>
                            </li>
                            <li class="sidebar-item pt-2">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('pegawai.penjualan.index') }}"
                                    aria-expanded="false">
                                        <img src="{{Vite::asset('resources/img/icon/employee/penjualan.png')}}" width="20">
                                    <span class="hide-menu">&nbsp;&nbsp;&nbsp;Penjualan</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb bg-white shadow-sm rounded">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Produk</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <div class="d-md-flex">
                                <ol class="breadcrumb ms-auto">
                                </ol>
                                <a href="{{ route('pegawai.produk.add') }}" class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                                    <i class="fa fa-plus-circle"></i>&nbsp;
                                    Tambah Produk
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <div style="min-height: 1000px; width: 100%">
                        <div class="pt-5 pl-5 pr-5">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <!-- <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
                        href="https://www.wrappixel.com/">wrappixel.com</a>
                </footer> -->
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>

        <!-- Footer Section Start -->
        <footer class="employee-footer">
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
