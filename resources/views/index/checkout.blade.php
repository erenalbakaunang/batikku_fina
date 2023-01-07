<x-home-layout>
    <div class="col-lg-10 offset-lg-1 checkout">
        <form action="{{ route('index.order') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="cartIds" value="{{json_encode($cartIds)}}" />

            <div class="col-lg-12" style="border: solid 1px #ABABAB; padding: 20px;">
                <div class="mb-3">
                    <b>
                        <i class="fa fa-map-marker"></i>&ensp;
                        Alamat Pengiriman
                    </b>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        {{ $pelanggan->nama_pelanggan }} (+62)<br/>
                        {{ $pelanggan->telepon }}
                    </div>

                    <div class="col-lg-9">
                        {{ $pelanggan->alamat }}
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-4 mb-4" style="border: solid 1px #ABABAB; padding: 0px 15px;">
                <div class="row boxChoose">
                    <div class="col-lg-2">
                        Metode<br/>
                        Pembayaran
                    </div>

                    <div class="col-lg-8">
                        <button type="button" class="btn btn-sm btn-secondary mt-0">
                            Transfer Bank
                        </button>
                    </div>
                </div>

                <div class="row boxChoose">
                    <div class="col-lg-2">
                        Pilih Bank
                    </div>

                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="bankMandiri">
                                <input required type="radio" name="bank" value="Transfer Mandiri" id="bankMandiri" class="float-left mr-2" />
                                <img src="{{ Vite::asset('resources/img/bank/mandiri.png') }}" class="bank-icon float-left" />
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="bankBNI">
                                <input required type="radio" name="bank" value="Transfer BNI" id="bankBNI" class="float-left mr-2" />
                                <img src="{{ Vite::asset('resources/img/bank/bni.png') }}" class="bank-icon float-left" />
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="bankBRI">
                                <input required type="radio" name="bank" value="Transfer BRI" id="bankBRI" class="float-left mr-2" />
                                <img src="{{ Vite::asset('resources/img/bank/bri.png') }}" class="bank-icon float-left" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row boxChoose">
                    <div class="col-lg-2">
                        Pengiriman
                    </div>

                    <div class="col-lg-4">
                        <button type="button" class="btn btn-sm btn-secondary mt-0">
                            Reguler
                        </button>
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-4">
                        <table class="table no-border buat-pesanan">
                            <tr>
                                <td>Subtotal untuk produk</td>
                                <td>Rp{{ number_format($total_pembayaran, '0', ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Biaya Layanan</td>
                                <td>Rp{{ number_format(env('BIAYA_LAYANAN'), '0', ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Total Pembayaran</td>
                                <td>Rp{{ number_format( $total_pembayaran+env('BIAYA_LAYANAN'), '0', ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-sm btn-dark">
                                        Buat Pesanan
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-home-layout>