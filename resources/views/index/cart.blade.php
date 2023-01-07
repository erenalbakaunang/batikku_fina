<x-home-layout>
    @if (session('status') === 'cart-deleted')
        <div style="margin: 0 0 20px;"
            x-data="{ show: true }"
            x-show="show"
            class="text-sm text-gray-600 alert alert-success"
            role="alert">
            <i class="fa fa-check"></i>&ensp;
            {{ __('Berhasil Didelete') }}
        </div>
    @endif

    <div class="col-lg-11 ml-5">
        <h4>Products in the cart</h4>

        <form action="{{ route('index.checkout') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-cart">
                        <?php $total_amount = 0; ?>

                        @foreach($data as $cart)
                            <tr class="first">
                                <td rowspan="2"><img src="{{ url('foto/'.$cart->produk->foto) }}" style="height: 125px;" /></td>
                                <td>
                                    <b>{{ $cart->produk->nama_produk }}</b>
                                    <h6>Rp.{{ $cart->produk->harga }}</h6>
                                </td>
                                <td rowspan="2"></td>
                                <td rowspan="2">
                                    <p>Total</p>
                                    <p>Rp.{{ number_format($cart->produk->harga * $cart->jumlah, 0, ',', '.') }}</p>
                                </td>
                                <td>
                                    <input type="checkbox" name="cart_id[]" value="{{ $cart->id }}" class="form-control" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Quantity
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('index.cartDelete', $cart->id) }}" onclick="return confirm('Are you sure?')" class="link-delete-cart">
                                        <i class="fa fa-trash fa-2x"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr class="last">
                                <td colspan="5"></td>
                            </tr>

                            <?php $total_amount += ($cart->produk->harga * $cart->jumlah) ?>
                        @endforeach
                    </table>
                </div>

                <div class="col-lg-3">
                    <button class="btn btn-dark text-left col-lg-12">
                        <i class="fa fa-shopping-bag"></i>&nbsp;
                        Summary
                    </button>

                    <div class="col-lg-12 mt-3 mb-3">
                        <div class="row">
                            <div class="col-lg-7 pl-0">
                                The total amount
                            </div>
                            <div class="col-lg-5 pr-0 text-right">
                                <small>
                                    <b>Rp.{{ number_format($total_amount, 0, ',', '.') }}</b>
                                </small>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark mb-4 col-lg-12">
                        <i class="fa fa-shopping-bag"></i>&nbsp;
                        CHECKOUT
                    </button>

                    <div>
                        <h5 class="mb-3 mt-2"><b>accept</b></h5>
                        <div class="row mb-2" style="margin: 0px;">
                            <img src="{{ Vite::asset('resources/img/bank/mandiri.png') }}" class="bank-icon" />
                            <img src="{{ Vite::asset('resources/img/bank/bri.png') }}" class="bank-icon" />
                        </div>
                        <div>
                            <img src="{{ Vite::asset('resources/img/bank/bni.png') }}" class="bank-icon" />
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-lg-12 mt-5 mb-5">
            <h2 class="text-center mb-5">You may also like this</h2>
            <div class="col-lg-12">
                <div class="row">
                    @foreach($randomProducts as $thisProduct)
                        <div class="col-lg-3">
                            <a href="{{ route('index.product', $thisProduct->id) }}" class="link-product">
                                <img src="{{ url('foto/'.$thisProduct->foto) }}" style="width: 125px;" />
                                <div style="width: 125px;"><b>{{ $thisProduct->nama_produk }}</b></div>
                                <div>Rp{{ number_format($thisProduct->harga, 0, ',', '.') }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-home-layout>