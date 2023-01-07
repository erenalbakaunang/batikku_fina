<x-home-layout>
    <div class="col-lg-10 offset-lg-1 mb-5">
        <h5>Pencarian untuk : "{{ $keyword }}"</h5>

        <div class="row mt-4">
            @foreach($products as $product)
                <div class="col-lg-3 mb-4">
                    <a href="{{ route('index.product', $product->id) }}" class="link-product">
                        <img src="{{ url('foto/'.$product->foto) }}" style="width: 125px;" />
                        <div style="width: 125px;"><b>{{ $product->nama_produk }}</b></div>
                        <div>Rp{{ number_format($product->harga, 0, ',', '.') }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-home-layout>