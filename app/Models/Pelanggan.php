<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_pelanggan',
        'telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        'user_id',
    ];

    public function getEmail()
    {
        $user = User::where(['id' => $this->user_id])->first();

        return $user->email;
    }
}
