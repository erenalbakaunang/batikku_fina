<x-employee-layout>
    @section('title', 'Penjualan')

    <style> #buttonTambahProduk { display: none !important; } </style>

    <div class="pt-5 pl-5 pr-5">
        <table class="table table-produk">
            <thead>
                <tr>
                    <th scope="col">Nomor Pesanan</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $penjualan)
                    <tr>
                        <td>
                            <a href="{{ route('pegawai.penjualan.edit', $penjualan->id) }}">
                                {{ $penjualan->nomor_pesanan }}
                            </a>
                        </td>
                        <td>
                            {{ $penjualan->getNamaPelanggan() }}
                        </td>
                        <td>
                            Rp.{{ number_format($penjualan->total, 0, ',', '.') }}
                        </td>
                        <td>{{ $penjualan->pembayaran }}</td>
                        <td>
                            <button class="btn btn-sm btn-{{$penjualan->status == 'Belum Bayar' ? 'warning':'dark'}} col-lg-12">
                                {{ $penjualan->status }}
                            </button>
                        </td>
                        <td>{{ $penjualan->tanggal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-employee-layout>