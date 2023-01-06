<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdukController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = Produk::all();
        
        return view('pegawai.produk.index', [
            'user' => $request->user(),
            'data' => $data,
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
        $request->validate([
            'nama_produk' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'integer', 'max:11'],
            'stok' => ['required', 'integer', 'max:11'],
            'foto' => 'required|mimes:jpeg,png,jpg,gif',
            'deskripsi' => ['required', 'string'],
        ]);

        $foto = $request->file('foto');
        
        $imageName = time().'.'.$request->foto->extension();  
        $request->foto->move(public_path('foto'), $imageName);

        // Create pelanggan data
        $createProduk = Produk::create([
            'nama_produk' => $request->get('nama_produk'),
            'harga' => $request->get('harga'),
            'stok' => $request->get('stok'),
            'foto' => $imageName,
            'deskripsi' => $request->get('deskripsi'),
        ]);

        return Redirect::route('pegawai.produk.index')->with('status', 'produk-added');
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
