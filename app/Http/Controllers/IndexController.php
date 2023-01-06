<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return view('index.home');
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

    public function product(Request $request)
    {
        return view('index.product');
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
        return view('index.profile');
    }

    public function profileUpdate(Request $request)
    {
        dd('profileUpdate', $request->all());
    }
}
