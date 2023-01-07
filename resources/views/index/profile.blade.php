<x-home-layout>
    @if (session('status') === 'profile-updated')
        <div style="margin: 0 0 20px;"
            x-data="{ show: true }"
            x-show="show"
            class="text-sm text-gray-600 alert alert-success"
            role="alert">
            <i class="fa fa-check"></i>&ensp;
            {{ __('Berhasil Disimpan') }}
        </div>
    @endif

    <div class="col-lg-8 offset-lg-2 mt-5">
        <div class="">
            <h4 class="font-weight-bold">
                {{ __('Profil Saya') }}
            </h4>
            <small>
                <b>
                    Kelola Informasi profil Anda untuk mengontrol, melindungi, dan mengamankan akun
                </b>
            </small>
        </div>
        
        <div class="col-lg-12 col-md-12 form-profile">
            <form method="post" action="{{ route('index.profileUpdate') }}" class="">
                @csrf

                <div class="form-group row">
                    <x-input-label for="username" class="mt-1 col-sm-2" :value="__('Username')" />
                    <div class="col-sm-10">
                        <div class="mt-2">{{ $user->name }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label for="nama_pelanggan" class="mt-1 col-sm-2" :value="__('Nama')" />
                    <div class="col-sm-10">
                        <x-text-input id="nama_pelanggan" name="nama_pelanggan" :value="old('nama_pelanggan', $pelanggan->nama_pelanggan)" required type="text" class="mt-1 form-control" autocomplete="nama-pelanggan" />
                        <x-input-error :messages="$errors->get('nama_pelanggan')" class="mt-2" />
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label for="email" class="mt-1 col-sm-2" :value="__('Email')" />
                    <div class="col-sm-10">
                        <x-text-input id="email" name="email" :value="old('email', $user->email)" required type="text" class="mt-1 form-control" autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label for="telepon" class="mt-1 col-sm-2" :value="__('Nomor Telepon')" />
                    <div class="col-sm-10">
                        <x-text-input id="telepon" name="telepon" :value="old('telepon', $pelanggan->telepon)" required type="text" class="mt-1 form-control" autocomplete="telepon" />
                        <x-input-error :messages="$errors->get('telepon')" class="mt-2" />
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label for="jenis_kelamin" class="mt-1 col-sm-2" :value="__('Jenis Kelamin')" />
                    <div class="col-sm-10">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ (strtolower($pelanggan->jenis_kelamin) == 'laki-laki') ? 'checked' : '' }} /> Laki-laki
                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="ml-2" {{ (strtolower($pelanggan->jenis_kelamin) == 'perempuan') ? 'checked' : '' }} /> Perempuan
                        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label for="tanggal_lahir" class="mt-1 col-sm-2" :value="__('Tanggal Lahir')" />
                    <div class="col-sm-10">
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pelanggan->tanggal_lahir) }}" required type="text" class="mt-1 form-control" autocomplete="tanggal_lahir" />
                        <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                    </div>
                </div>

                <div class="form-group row">
                    <x-input-label for="alamat" class="mt-1 col-sm-2" :value="__('Alamat')" />
                    <div class="col-sm-10">
                        <textarea id="alamat" name="alamat" required type="text" class="mt-1 form-control" autocomplete="alamat">{{ $pelanggan->alamat }}</textarea>
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>
                </div>

                <div class="">
                    <center><button type="submit" class="btn btn-dark pl-4 pr-4">{{ __('Simpan') }}</button></center>
                </div>
            </form>
        </div>

        <form method="POST" class="mt-5" action="{{ route('logout') }}">
            @csrf

            <a class="btn btn-dark pl-5 pr-5" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">{{ __('Logout') }}</a>
        </form>
    </div>

    @if(!empty($penjualan))
        <div class="col-lg-8 col-md-8 offset-lg-2 pl-3 pr-3 mb-5 mt-5">
            <h5><b>Pesanan Saya</b></h5>
            <small>Cek status pesanan anda</small>

            <div class="col-lg-12 col-md-12 form-profile">
                @foreach($penjualan as $nomor_pesanan => $datas)

                    <?php $total_pesanan = 0; ?>

                    @foreach($datas as $data)
                        <div class="col-lg-12 row mb-2">
                            <div class="col-lg-3">
                                <img src="{{ url('foto/'.$data->produk->foto) }}" />
                            </div>

                            <div class="col-lg-9">
                                <h5><b>{{ $data->produk->nama_produk }}</b></h5>
                                <p>Rp.{{ number_format($data->produk->harga, 0, ',', '.') }}</p>
                                <p>x {{ $data->jumlah_produk }}</p>
                                <p class="text-right">Rp.{{ number_format($data->jumlah, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <?php $total_pesanan += $data->jumlah; ?>
                    @endforeach

                    <div class="col-lg-12 row mt-3 mb-2">
                        <div class="col-lg-10 text-right"><b>Total Pesanan</b></div>
                        <div class="col-lg-2 fcolor pl-0 pr-0 text-right"><b>RP {{ number_format( ($total_pesanan+env('BIAYA_LAYANAN')), 0, ',', '.') }}</b></div>
                    </div>

                    <div class="col-lg-12 mt-3 mb-5 text-right">
                        <button class="btn btn-{{ ($data['status'] == 'Belum Bayar') ? 'bgcolor fcwhite' : 'secondary' }}" style="min-width: 150px;">
                            {{ $data['status'] }}
                        </button> 
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</x-home-layout>