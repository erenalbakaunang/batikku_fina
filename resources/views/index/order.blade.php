<x-home-layout>
    <div class="col-lg-4 offset-lg-4 orderBox">
        <div class="col-lg-12 payment">
            <h5 class="mb-1"><b>Payments</b></h5>
            <h6>
                Silahkan lakukan pembayaran transfer pada<br/>
                rekening {{ $bank }}
            </h6>
        </div>

        <div class="col-lg-12">
            <div class="row mb-3">
                <div class="col-lg-6">
                    Nomor Pesanan
                </div>
                <div class="col-lg-6 text-right">
                    {{ $penjualan->nomor_pesanan }}
                </div>
            </div>

            <div class="col-lg-12">
                <img src="{{ Vite::asset('resources/img/bank/'.$bank.'.png') }}" style="height: 40px;" />
                Nomor Rekening {{ Str::ucfirst($bank) }}
            </div>

            <div class="col-lg-6 offset-lg-3 boxNomorRekening mt-3 mb-4">
                {{ env('NOMOR_REKENING_'.Str::upper($bank)) }}
            </div>

            <div class="col-lg-12">
                Waktu pembayaran 1 x 24 jam
            </div>

            <div class="col-lg-12 text-center mt-5">
                <a href="{{ route('index.profile') }}">
                    <button class="btn btn-sm btn-dark" style="width: 30%;">
                        OK
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-home-layout>