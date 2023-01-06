<x-home-layout>
    <div class="col-lg-8 col-md-8 mt-5 mb-5 row" style="margin: auto;">
        <div class="col-lg-4 col-md-4">
            <img src="{{ url('foto/'.$product->foto) }}" style="height: 400px;" />
        </div>

        <div class="col-lg-8 col-md-8">
            <div>
                <h4>{{ $product->nama_produk }}</h4>
            </div>

            <div class="mt-4">
                <h5><b>Rp{{ number_format($product->harga, 0, ',', '.') }}</b></h5>
            </div>

            <div class="mt-4">
                <h6>Quantity</h6>
            </div>

            <div class="mt-4">
                
            </div>

            <div class="mt-4">
                <h6>Deskripsi</h6>
                <div class="mt-2">
                    <div style="font-size: 14px;">{{ $product->deskripsi }}</div>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-dark btn-lg pt-3 pb-3">
                    <div style="font-size: 12px;">ADD TO CART</div>
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 pl-3 pr-3 mb-5 mt-5">
        <h5><b>Customers also brought these</b></h5>

        <div class="row mt-3">
            @foreach($products as $thisProduct)
                <div class="col-lg-3 col-md-3">
                    <a href="{{ route('index.product', $thisProduct->id) }}">
                        <img src="{{ url('foto/'.$thisProduct->foto) }}" style="width: 100%;" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-home-layout>