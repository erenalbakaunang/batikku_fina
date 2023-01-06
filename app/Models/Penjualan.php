<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomor_pesanan',
        'jumlah',
        'jumlah_produk',
        'pembayaran',
        'status',
        'tanggal',
        'pelanggan_id',
        'produk_id',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function getNamaPelanggan()
    {
        $pelanggan = Pelanggan::where(['id' => $this->pelanggan_id])->first();

        return $pelanggan->nama_pelanggan;
    }

    public function getEmailPelanggan()
    {
        $pelanggan = Pelanggan::where(['id' => $this->pelanggan_id])->first();

        return $pelanggan->getEmail();
    }
}
