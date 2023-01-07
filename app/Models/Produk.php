<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
        'foto',
        'deskripsi',
        'id_produk',
    ];

    public function getPenjualan()
    {
        $penjualanModel = new Penjualan();
        $total_penjualan = 0;

        $datas = $penjualanModel->where(['produk_id' => $this->id])->get();
        foreach($datas as $data) {
            $total_penjualan += $data['jumlah_produk'];
        }

        return $total_penjualan;
    }
}
