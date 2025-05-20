<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $banners = Banner::all();      // Ambil semua banner dari database
        $produks = Produk::all();      // Ambil semua produk dari database
        return view('home', compact('banners', 'produks'));
    }



    public function menu()
    {
        $produks = Produk::all();
        return view('menu', compact('produks'));
    }
}
