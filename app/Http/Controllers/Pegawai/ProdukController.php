<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    public function edit(Request $request, $id)
    {
        $produk = Produk::find($id);

        return view('pegawai.produk.edit', [
            'user' => $request->user(),
            'produk' => $produk,
        ]);
    }

    public function insert(Request $request)  
    {
        $request->validate([
            'nama_produk' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'integer'],
            'stok' => ['required', 'integer'],
            'foto' => 'required|mimes:jpeg,png,jpg,gif',
            'deskripsi' => ['required', 'string'],
            'id_produk' => ['required', 'string', 'max:10'],
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
            'id_produk' => $request->get('id_produk'),
        ]);

        return Redirect::route('pegawai.produk.index')->with('status', 'produk-added');
    }

    public function update(Request $request, $id)  
    {
        $produkModel = Produk::find($id);

        $request->validate([
            'nama_produk' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'integer'],
            'stok' => ['required', 'integer'],
            'foto' => 'mimes:jpeg,png,jpg,gif',
            'deskripsi' => ['required', 'string'],
            'id_produk' => ['required', 'string', 'max:10'],
        ]);

        $foto = $request->file('foto');
        
        if(!empty($foto)) {
            // delete old foto file
            $old_path = public_path('foto/'.$produkModel->foto);
            if(file_exists($old_path)) {
                File::delete($old_path);
            }

            // save new foto file
            $imageName = time().'.'.$request->foto->extension();  
            $request->foto->move(public_path('foto'), $imageName);

            $updateProduk = $produkModel->update(['foto' => $imageName]);
        }

        $updateProduk = $produkModel->update([
            'nama_produk' => $request->get('nama_produk'),
            'harga' => $request->get('harga'),
            'stok' => $request->get('stok'),
            'deskripsi' => $request->get('deskripsi'),
            'id_produk' => $request->get('id_produk'),
        ]);

        return Redirect::route('pegawai.produk.edit', $id)->with('status', 'produk-updated');
    }

    public function delete(Request $request, $id)  
    {
        $produkModel = Produk::find($id);
        $produkModel->delete();

        return Redirect::route('pegawai.produk.index')->with('status', 'produk-deleted');
    }
}
