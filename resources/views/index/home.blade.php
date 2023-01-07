<x-home-layout>
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
                @foreach($newProducts as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item">
                            <a href="{{ route('index.product', $product->id) }}" class="link-product">
                                <div class="product__item__pic set-bg" data-setbg="{{ url('foto/'.$product->foto) }}"></div>
                                <div class="product__item__text">
                                    <h6>{{ $product->nama_produk }}</h6>
                                    <h5>Rp{{ number_format($product->harga, 0, ',', '.') }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
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
                @foreach($popular as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item">
                            <a href="{{ route('index.product', $product->id) }}" class="link-product">
                                <div class="product__item__pic set-bg" data-setbg="{{ url('foto/'.$product->foto) }}"></div>
                                <div class="product__item__text">
                                    <h6>{{ $product->nama_produk }}</h6>
                                    <h5>Rp{{ number_format($product->harga, 0, ',', '.') }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
</x-home-layout>