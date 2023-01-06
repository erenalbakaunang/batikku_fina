<x-employee-layout>
    @if (session('status') === 'profile-updated')
        <div style="margin: 0 -25px 20px;"
            x-data="{ show: true }"
            x-show="show"
            class="text-sm text-gray-600 alert alert-success"
            role="alert">
            <i class="fa fa-check"></i>&ensp;
            {{ __('Berhasil Disimpan') }}
        </div>
    @endif

    <div class="">
        <h2 class="font-weight-bold">
            {{ __('Profil Saya') }}
        </h2>
        <h4>Kelola Informasi profil Anda untuk mengontrol, melindungi, dan mengamankan akun</h4>
    </div>
    
    <div class="col-lg-10 col-md-10 form-profile">
        <form method="post" action="{{ route('pegawai.profile.update') }}" class="">
            @csrf

            <div class="form-group row">
                <x-input-label for="username" class="mt-1 col-sm-2" :value="__('Username')" />
                <div class="col-sm-10">
                    <div class="mt-2">{{ $user->name }}</div>
                </div>
            </div>

            <div class="form-group row">
                <x-input-label for="nama_pegawai" class="mt-1 col-sm-2" :value="__('Nama')" />
                <div class="col-sm-10">
                    <x-text-input id="nama_pegawai" name="nama_pegawai" :value="old('nama_pegawai', $pegawai->nama_pegawai)" required type="text" class="mt-1 form-control" autocomplete="nama-pegawai" />
                    <x-input-error :messages="$errors->updatePassword->get('nama_pegawai')" class="mt-2" />
                </div>
            </div>

            <div class="form-group row">
                <x-input-label for="email" class="mt-1 col-sm-2" :value="__('Email')" />
                <div class="col-sm-10">
                    <x-text-input id="email" name="email" :value="old('email', $user->email)" required type="text" class="mt-1 form-control" autocomplete="email" />
                    <x-input-error :messages="$errors->updatePassword->get('email')" class="mt-2" />
                </div>
            </div>

            <div class="form-group row">
                <x-input-label for="jenis_kelamin" class="mt-1 col-sm-2" :value="__('Jenis Kelamin')" />
                <div class="col-sm-10">
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ (strtolower($pegawai->jenis_kelamin) == 'laki-laki') ? 'checked' : '' }} /> Laki-laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="ml-2" {{ (strtolower($pegawai->jenis_kelamin) == 'perempuan') ? 'checked' : '' }} /> Perempuan
                    <x-input-error :messages="$errors->updatePassword->get('jenis_kelamin')" class="mt-2" />
                </div>
            </div>

            <div class="form-group row">
                <x-input-label for="alamat" class="mt-1 col-sm-2" :value="__('Alamat')" />
                <div class="col-sm-10">
                    <textarea id="alamat" name="alamat" required type="text" class="mt-1 form-control" autocomplete="alamat">{{ $pegawai->alamat }}</textarea>
                    <x-input-error :messages="$errors->updatePassword->get('alamat')" class="mt-2" />
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
</x-employee-layout>
