<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pegawai;
use App\Models\Pelanggan;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->pegawaiSeeder();
        $this->pelangganSeeder();
        $this->produkSeeder();
        $this->penjualanSeeder();
        $this->cartSeeder();
    }

    private function pegawaiSeeder()
    {
        User::factory()->create(
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@batikku.com',
                'password' => bcrypt('1234'),
            ]
        );

        DB::table('pegawai')->insert([
            'id' => 1,
            'nama_pegawai' => 'Admin Pegawai',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => '',
            'user_id' => 1,
        ]);
    }

    public function pelangganSeeder()
    {
        User::factory()->create(
        [
            'id' => 2,
            'name' => 'john',
            'email' => 'john@gmail.com',
            'password' => bcrypt('1234'),
        ]
        );

        DB::table('pelanggan')->insert([
            'id' => 1,
            'nama_pelanggan' => 'John',
            'jenis_kelamin' => 'Laki-laki',
            'telepon' => '0852812782',
            'tanggal_lahir' => '1990-11-12',
            'alamat' => 'Sydney street',
            'user_id' => 2,
        ]);
    }

    private function produkSeeder()
    {
        $datas = [
            [
                'id' => 1,
                'nama_produk' => 'Blue Blouse Batik Women Flower',
                'harga' => 200000,
                'stok' => 1,
                'foto' => 'product7.png',
                'id_produk' => 'P07',
            ],
            [
                'id' => 2,
                'nama_produk' => 'Brown Lurik Set Women',
                'harga' => 195000,
                'stok' => 1,
                'foto' => 'product6.png',
                'id_produk' => 'P06',
            ],
            [
                'id' => 3,
                'nama_produk' => 'Black Batik Women Set Casual',
                'harga' => 210000,
                'stok' => 1,
                'foto' => 'product5.png',
                'id_produk' => 'P05',
            ],
            [
                'id' => 4,
                'nama_produk' => 'Tosca grey Batik Shirt Man',
                'harga' => 200000,
                'stok' => 1,
                'foto' => 'product4.png',
                'id_produk' => 'P04',
            ],
            [
                'id' => 5,
                'nama_produk' => 'Cream Blue Blouse Women',
                'harga' => 250000,
                'stok' => 1,
                'foto' => 'product1.png',
                'id_produk' => 'P01',
            ],
            [
                'id' => 6,
                'nama_produk' => 'Blue Blouse Women Modern',
                'harga' => 270000,
                'stok' => 1,
                'foto' => 'product2.png',
                'id_produk' => 'P02',
            ],
            [
                'id' => 7,
                'nama_produk' => 'Pink Green Blouse Women',
                'harga' => 210000,
                'stok' => 1,
                'foto' => 'product3.png',
                'id_produk' => 'P03',
            ],
        ];

        foreach($datas as $data) {
            DB::table('produk')->insert([
                'nama_produk' => $data['nama_produk'],
                'harga' => $data['harga'],
                'stok' => $data['stok'],
                'foto' => $data['foto'],
                'id_produk' => $data['id_produk'],
            ]);
        }
    }

    private function penjualanSeeder()
    {
        DB::table('penjualan')->insert([
            'nomor_pesanan' => '198X3789JK',
            'jumlah' => 500000,
            'jumlah_produk' => 2,
            'pembayaran' => 'Transfer BNI',
            'status' => 'Belum Bayar',
            'tanggal' => '2023-01-03',
            'id_pelanggan' => 1,
            'id_produk' => 5,
        ]);
        
        DB::table('penjualan')->insert([
            'nomor_pesanan' => '198X3789JK',
            'jumlah' => 200000,
            'jumlah_produk' => 1,
            'pembayaran' => 'Transfer BNI',
            'status' => 'Belum Bayar',
            'tanggal' => '2023-01-03',
            'id_pelanggan' => 1,
            'id_produk' => 4,
        ]);

        DB::table('penjualan')->insert([
            'nomor_pesanan' => '177X3559JK',
            'jumlah' => 270000,
            'jumlah_produk' => 1,
            'pembayaran' => 'Transfer Mandiri',
            'status' => 'Pembayaran Terkonfirmasi',
            'tanggal' => '2023-01-06',
            'id_pelanggan' => 1,
            'id_produk' => 6,
        ]);
    }

    private function cartSeeder()
    {
        DB::table('cart')->insert([
            'jumlah' => 2,
            'produk_id' => 3,
            'pelanggan_id' => 1,
        ]);

        DB::table('cart')->insert([
            'jumlah' => 1,
            'produk_id' => 2,
            'pelanggan_id' => 1,
        ]);
    }
}
