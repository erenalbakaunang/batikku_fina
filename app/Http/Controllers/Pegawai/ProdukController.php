<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('pegawai.produk.index', [
            'user' => $request->user(),
        ]);
    }

    public function add(Request $request)  
    {
        return view('pegawai.produk.add', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request)  
    {
        return view('pegawai.produk.edit', [
            'user' => $request->user(),
        ]);
    }

    public function insert(Request $request)  
    {
        dd('penjualan.insert', $request);
    }

    public function update(Request $request)  
    {
        dd('penjualan.update', $request);
    }

    public function delete(Request $request)  
    {
        dd('penjualan.delete', $request);
    }
}
