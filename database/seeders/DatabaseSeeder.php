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
        $pegawaiModel = new Pegawai();
        $pelangganModel = new Pelanggan();

        // \App\Models\User::factory(10)->create();

        User::factory()->create(
            [
                'name' => 'admin',
                'email' => 'admin@batikku.com',
                'password' => bcrypt('1234'),
            ]
        );

        User::factory()->create(
        [
            'name' => 'john',
            'email' => 'john@gmail.com',
            'password' => bcrypt('1234'),
        ]
        );

        DB::table($pegawaiModel->getTable())->insert([
            'nama_pegawai' => 'Admin Pegawai',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => '',
            'user_id' => 1,
        ]);

        DB::table($pelangganModel->getTable())->insert([
            'nama_pelanggan' => 'John',
            'jenis_kelamin' => 'Laki-laki',
            'telepon' => '0852812782',
            'tanggal_lahir' => '1990-11-12',
            // 'alamat' => 'Sydney street',
            'user_id' => 2,
        ]);
    }
}
