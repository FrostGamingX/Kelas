<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    public function run()
    {
        DB::table('banners')->insert([
            ['judul' => 'Promo Ayam Super Hemat', 'gambar' => 'banner1.jpeg'],
            ['judul' => 'Diskon Akhir Pekan', 'gambar' => 'banner2.jpg'],
            ['judul' => 'Diskon Akhir Pekan', 'gambar' => 'banner2.jpg'],
        ]);
    }
}
