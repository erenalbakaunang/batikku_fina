<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PenjualanController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = Penjualan::groupBy('nomor_pesanan')->selectRaw('*, sum(jumlah) as total')->get();
        
        return view('pegawai.penjualan.index', [
            'user' => $request->user(),
            'data' => $data,
        ]);
    }

    public function edit(Request $request, $id)  
    {
        $penjualan = Penjualan::find($id);
        $data = Penjualan::where('nomor_pesanan', $penjualan->nomor_pesanan)->groupBy('nomor_pesanan')->selectRaw('*, sum(jumlah) as total')->first();

        $listStatus = [
            'Belum Bayar',
            'Pembayaran Terkonfirmasi',
        ];

        return view('pegawai.penjualan.edit', [
            'user' => $request->user(),
            'penjualan' => $data,
            'listStatus' => $listStatus,
        ]);
    }

    public function update(Request $request, $id)  
    {
        $penjualanModel = Penjualan::find($id);

        $request->validate([
            'status' => ['required', 'string', 'max:30'],
        ]);

        DB::table('penjualan')->where('nomor_pesanan', $penjualanModel->nomor_pesanan)->update(['status' => $request->get('status')]);

        return Redirect::route('pegawai.penjualan.edit', $id)->with('status', 'penjualan-updated');
    }
}
