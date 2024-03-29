<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $newProducts = Produk::orderBy('id', 'DESC')->offset(0)->limit(4)->get();
        $popular = Produk::inRandomOrder()->limit(4)->get();
        
        return view('index.home', [
            'newProducts' => $newProducts,
            'popular' => $popular,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');

        $produkModel = Produk::where('nama_produk', 'LIKE', '%'.$keyword.'%')->get();

        return view('index.search', [
            'keyword' => $keyword,
            'products' => $produkModel,
        ]);
    }

    public function about(Request $request)
    {
        return view('index.about');
    }

    public function cart(Request $request)
    {
        $userModel = $request->user();
        $pelangganModel = $userModel->getPelanggan();

        $data = Cart::where(['pelanggan_id' => $pelangganModel->id])->get();
        $randomProducts = Produk::inRandomOrder()->limit(4)->get();

        return view('index.cart', [
            'data' => $data,
            'randomProducts' => $randomProducts,
        ]);
    }

    public function cartAdd(Request $request)
    {
        $userModel = $request->user();
        $pelangganModel = $userModel->getPelanggan();

        $qty = $request->get('quantity');
        $produk_id = $request->get('produk_id');
        $cart_id = $request->get('cart_id');

        if(empty($cart_id)) {
            $cartModel = Cart::where([
                'produk_id' => $produk_id,
                'pelanggan_id' => $pelangganModel->id,
            ])->first();
        } else {
            $cartModel = Cart::find($cart_id);
        }
            
        if(empty($cartModel)) {
            // Create new cart
            Cart::create([
                'jumlah' => $qty,
                'produk_id' => $produk_id,
                'pelanggan_id' => $pelangganModel->id,
            ]);
        } else {
            $produkModel = Produk::find($produk_id);
            $stok = $produkModel->stok;

            if(!empty($cart_id)) {
                // submitted from cart page
                $new_jumlah = $qty;
            } else {
                // submitted from product page
                $new_jumlah = $cartModel->jumlah + $qty;
            }

            if($new_jumlah > $stok) {
                $qty = $stok;
            } else {
                $qty = $new_jumlah;
            }

            // Update cart
            $cartModel->update([
                'jumlah' => $qty,
            ]);
        }

        return Redirect::back()->with('status', 'cart-updated');
    }

    public function cartDelete(Request $request, $cart_id)
    {
        $cartModel = Cart::find($cart_id);
        $cartModel->delete();

        return Redirect::route('index.cart')->with('status', 'cart-deletedphp');
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
        $userModel = $request->user();
        $pelangganModel = $userModel->getPelanggan();

        $cartIds = $request->get('cart_id');
        $total_pembayaran = 0;

        if(empty($cartIds)) {
            return Redirect::route('index.cart');
        } else {
            foreach($cartIds as $cart_id) {
                $cartModel = Cart::find($cart_id);
                $total_pembayaran += ($cartModel->produk->harga * $cartModel->jumlah);
            }

            return view('index.checkout', [
                'user' => $userModel,
                'pelanggan' => $pelangganModel,
                'cartIds' => $cartIds,
                'total_pembayaran' => $total_pembayaran,
            ]);
        }
    }

    public function order(Request $request)
    {
        $userModel = $request->user();
        $pelangganModel = $userModel->getPelanggan();

        $cartIds = json_decode($request->get('cartIds'));
        $bank = $request->get('bank');
        $status = 'Belum Bayar';
        $tanggal = date('Y-m-d');
        $nomor_pesanan = $this->generateRandomString();

        foreach($cartIds as $key => $cart_id) {
            $cartModel = Cart::find($cart_id);

            $data = [
                'nomor_pesanan' => $nomor_pesanan,
                'jumlah' => ($cartModel->produk->harga * $cartModel->jumlah),
                'jumlah_produk' => $cartModel->jumlah,
                'pembayaran' => $bank,
                'status' => $status,
                'tanggal' => $tanggal,
                'pelanggan_id' => $pelangganModel->id,
                'produk_id' => $cartModel->produk_id,
            ];

            // Insert penjualan
            Penjualan::create($data);

            // Delete cart
            $cartModel->delete();
        }

        $penjualanModel = Penjualan::where('nomor_pesanan', $nomor_pesanan)->groupBy('nomor_pesanan')->selectRaw('*, sum(jumlah) as total')->first();

        $bank = str_replace('Transfer ', '', $penjualanModel->pembayaran);

        return view('index.order', [
            'user' => $userModel,
            'pelanggan' => $pelangganModel,
            'penjualan' => $penjualanModel,
            'bank' => strtolower($bank),
        ]);
    }

    public function profile(Request $request)
    {
        $userModel = $request->user();
        $pelangganModel = $userModel->getPelanggan();
        // $penjualan = Penjualan::groupBy('nomor_pesanan')->selectRaw('*, sum(jumlah) as total')->get();

        $penjualan = []; 
        foreach(Penjualan::where('pelanggan_id', $pelangganModel->id)->get() as $key => $data) {
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

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return strtoupper($randomString);
    }
}
