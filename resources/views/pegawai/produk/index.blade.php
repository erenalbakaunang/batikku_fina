<x-employee-layout>
    @section('title', 'Produk')
    
    @if (session('status') === 'produk-deleted')
        <div style="margin: 0 -25px 0;"
            x-data="{ show: true }"
            x-show="show"
            class="text-sm text-gray-600 alert alert-success"
            role="alert">
            <i class="fa fa-check"></i>&ensp;
            {{ __('Berhasil Didelete') }}
        </div>
    @endif

    <div class="pt-5 pl-5 pr-5">
        <table class="table table-produk">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Penjualan</th>
                    <th scope="col">Aksi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $produk)
                    <tr>
                        <td style="vertical-align: middle;">{{ $produk->id_produk }}</td>
                        <td style="vertical-align: top !important;">
                            <img src="{{ url('foto/'.$produk->foto) }}" alt="" title="" style="height: 100px;" />
                            {{ $produk->nama_produk }}
                        </td>
                        <td>
                            Rp.{{ number_format($produk->harga, 0, ',', '.') }}
                        </td>
                        <td>{{ $produk->stok }}</td>
                        <td>{{ $produk->getPenjualan() }}</td>
                        <td>
                            <a href="{{ route('pegawai.produk.edit', $produk->id) }}">Ubah</a>
                        </td>
                        <td>
                            <a href="{{ route('pegawai.produk.delete', $produk->id) }}" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-employee-layout>