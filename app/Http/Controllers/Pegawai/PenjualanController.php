<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('pegawai.penjualan.index', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request)  
    {
        return view('pegawai.penjualan.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)  
    {
        dd('penjualan.update', $request);
    }
}
