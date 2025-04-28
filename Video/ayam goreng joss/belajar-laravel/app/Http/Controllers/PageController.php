<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Produk;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        $banners = Banner::all();      // Ambil semua banner dari database
        $produks = Produk::all();      // Ambil semua produk dari database
        return view('home', compact('banners', 'produks'));
    }

    public function profil() {
        return view('profil');
    }

    public function kontak() {
        return view('kontak');
    }

    public function jurusan() {
        return view('jurusan');
    }
}
