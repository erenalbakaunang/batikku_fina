<x-home-layout>
    @if (session('status') === 'cart-updated')
        <div style="margin: 0 0 20px;"
            x-data="{ show: true }"
            x-show="show"
            class="text-sm text-gray-600 alert alert-success"
            role="alert">
            <i class="fa fa-check"></i>&ensp;
            {{ __('Cart updated') }}
        </div>
    @endif

    <div class="col-lg-8 col-md-8 mt-5 mb-5 row" style="margin: auto;">
        <div class="col-lg-4 col-md-4">
            <img src="{{ url('foto/'.$product->foto) }}" style="height: 400px;" />
        </div>

        <div class="col-lg-8 col-md-8">
            <form action="{{ route('index.cartAdd') }}" method="POST">
                @csrf
                <input type="hidden" name="produk_id" value="{{$product->id}}" />

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
                    <div class="input-group mb-3 qty">
                        <span class="input-group-text" data-quantity="minus" data-field="quantity">-</span>
                        <input type="text" name="quantity" class="form-control text-center" value="1" data-max="{{$product->stok}}" />
                        <span class="input-group-text" data-quantity="plus" data-field="quantity">+</span>
                    </div>
                </div>

                <div class="mt-4">
                    <h6>Deskripsi</h6>
                    <div class="mt-2">
                        <div style="font-size: 14px;">{{ $product->deskripsi }}</div>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-dark btn-lg pt-3 pb-3 col-lg-6 bgcolor bdcolor" type="submit" {{$product->stok > 0 ?: 'disabled'}}>
                        <div style="font-size: 12px;">ADD TO CART</div>
                    </button>
                </div>
            </form>
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