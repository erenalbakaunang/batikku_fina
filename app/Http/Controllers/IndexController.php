<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $newProducts = Produk::offset(0)->limit(4)->get();
        $popular = Produk::inRandomOrder()->limit(4)->get();
        
        return view('index.home', [
            'newProducts' => $newProducts,
            'popular' => $popular,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');

        return view('index.search');
    }

    public function about(Request $request)
    {
        return view('index.about');
    }

    public function cart(Request $request)
    {
        return view('index.cart');
    }

    public function product(Request $request, $id)
    {
        $produkModel = Produk::find($id);
        $products = Produk::inRandomOrder()->limit(4)->get();

        return view('index.product', [
            'product' => $produkModel,
            'products' => $products
        ]);
    }

    public function checkout(Request $request)
    {
        return view('index.checkout');
    }

    public function order(Request $request)
    {
        return view('index.order');
    }

    public function profile(Request $request)
    {
        $userModel = $request->user();
        $pelangganModel = $userModel->getPelanggan();
        // $penjualan = Penjualan::groupBy('nomor_pesanan')->selectRaw('*, sum(jumlah) as total')->get();

        $penjualan = []; 
        foreach(Penjualan::all() as $key => $data) {
            if(!isset($penjualan[$data['nomor_pesanan']])) {
                $penjualan[$data['nomor_pesanan']] = [];
            } 

            $penjualan[$data['nomor_pesanan']][] = $data;
        }
        
        return view('index.profile', [
            'user' => $userModel,
            'pelanggan' => $pelangganModel,
            'penjualan' => $penjualan,
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $userModel = $request->user();
        $pelangganModel = $userModel->getPelanggan();

        $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:50'],
            'telepon' => ['required', 'numeric', 'digits_between:1,15'],
            'jenis_kelamin' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'string', 'date'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $nama_pelanggan = $request->get('nama_pelanggan');
        $email = $request->get('email');
        $jenis_kelamin = $request->get('jenis_kelamin');
        $alamat = $request->get('alamat');
        $telepon = $request->get('telepon');
        $tanggal_lahir = $request->get('tanggal_lahir');

        $updateUser = $userModel->update([
            'email' => $email,
        ]);

        $updatePelanggan = $pelangganModel->update([
            'nama_pelanggan' => $nama_pelanggan,
            'jenis_kelamin'=> $jenis_kelamin,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'tanggal_lahir' => $tanggal_lahir,
        ]);

        return Redirect::route('index.profile')->with('status', 'profile-updated');
    }
}
