<x-employee-layout>
    @if ($errors->any())
        <div class="alert alert-danger" style="margin: -50px -75px 20px;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-lg-10 col-md-10 form-profile">
        <form method="post" enctype="multipart/form-data" action="{{ route('pegawai.produk.insert') }}" class="">
            @csrf

            <div class="form-group row">
                <x-input-label for="username" class="mt-1 col-sm-2" :value="__('Foto Produk')" />
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="foto" aria-describedby="foto">
                        <label class="custom-file-label" for="foto">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <x-input-label for="nama_produk" class="mt-1 col-sm-2" :value="__('Nama Produk')" />
                <div class="col-sm-10">
                    <x-text-input id="nama_produk" name="nama_produk" placeholder="Mohon masukkan" :value="old('nama_produk')" required type="text" class="mt-1 form-control" autocomplete="nama-produk" />
                </div>
            </div>

            <div class="form-group row">
                <x-input-label for="deskripsi" class="mt-1 col-sm-2" :value="__('Deskripsi Tugas')" />
                <div class="col-sm-10">
                    <textarea id="deskripsi" name="deskripsi" required class="mt-1 form-control" autocomplete="deskripsi">{{ old('deskripsi') }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <x-input-label for="harga" class="mt-1 col-sm-2" :value="__('Harga')" />
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <x-text-input id="harga" name="harga" placeholder="Mohon masukkan" :value="old('harga')" required type="text" class="mt-1 form-control" autocomplete="harga" />
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <x-input-label for="stok" class="mt-1 col-sm-2" :value="__('Stok')" />
                <div class="col-sm-10">
                    <input type="number" id="stok" name="stok" placeholder="0" :value="old('stok')" required type="text" class="mt-1 form-control" autocomplete="stok" />
                </div>
            </div>

            <div class="form-group row">
                <x-input-label for="id_produk" class="mt-1 col-sm-2" :value="__('ID Produk')" />
                <div class="col-sm-10">
                    <x-text-input id="id_produk" name="id_produk" placeholder="Mohon masukkan" :value="old('id_produk')" required type="text" class="mt-1 form-control" autocomplete="nama-produk" />
                </div>
            </div>

            <div class="">
                <center><button type="submit" class="btn btn-dark pl-4 pr-4">{{ __('Simpan') }}</button></center>
            </div>
        </form>
    </div>
</x-employee-layout>