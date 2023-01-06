<x-employee-layout>
    @section('title', 'Penjualan')

    <style> #buttonTambahProduk { display: none !important; } </style>

    @if ($errors->any())
        <div class="alert alert-danger" style="margin: 0 -25px 0;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status') === 'penjualan-updated')
        <div style="margin: 0 -25px 20px;"
            x-data="{ show: true }"
            x-show="show"
            class="text-sm text-gray-600 alert alert-success"
            role="alert">
            <i class="fa fa-check"></i>&ensp;
            {{ __('Berhasil Diupdate') }}
        </div>
    @endif

    <div class="pt-5 pl-5 pr-5">
        <form method="post" action="{{ route('pegawai.penjualan.update', $penjualan->id) }}" class="">
            <div class="col-lg-8 col-md-8 form-profile penjualan" style="margin: auto;">
                @csrf

                <div class="form-group row">
                    <x-input-label class="col-sm-5" :value="__('Nomor Pesanan')" />
                    <div class="col-sm-7">
                        {{ $penjualan->nomor_pesanan }}
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label class="col-sm-5" :value="__('Tanggal Pesanan')" />
                    <div class="col-sm-7">
                        {{ $penjualan->tanggal }}
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label class="col-sm-5" :value="__('Pelanggan')" />
                    <div class="col-sm-7">
                        <b>{{ $penjualan->getNamaPelanggan() }}</b>
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label class="col-sm-5" :value="__('Email')" />
                    <div class="col-sm-7">
                        {{ $penjualan->getEmailPelanggan() }}
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label class="col-sm-5" :value="__('Pembayaran')" />
                    <div class="col-sm-7">
                        {{ $penjualan->pembayaran }}
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label class="col-sm-5" :value="__('Jumlah')" />
                    <div class="col-sm-7">
                        Rp.
                        {{ number_format($penjualan->total, 0, ',', '.') }}
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label class="col-sm-5" :value="__('Status')" />
                    <div class="col-sm-7">
                        <select class="form-select" name="status" aria-label="Default select example">
                            @foreach($listStatus as $status)
                                <option value="{{ $status }}" {{ strtolower($status) == strtolower($penjualan->status) ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <center><button type="submit" class="btn btn-dark pl-4 pr-4">{{ __('Update Status') }}</button></center>
            </div>
        </form>
    </div>
</x-employee-layout>
