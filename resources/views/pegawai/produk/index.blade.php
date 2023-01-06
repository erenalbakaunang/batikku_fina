<x-employee-layout>
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
                    <td>1</td>
                    <td>
                        <img src="{{ url('foto/'.$produk->foto) }}" alt="" title="" class="col-lg-2" />
                        {{ $produk->nama_produk }}
                    </td>
                    <td>{{ $produk->harga }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td></td>
                    <td>
                        <a href="{{ route('pegawai.produk.edit', $produk->id) }}">Ubah</a>
                    </td>
                    <td>
                        <a href="">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-employee-layout>