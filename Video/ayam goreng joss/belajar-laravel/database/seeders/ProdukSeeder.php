<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'nama' => 'Ayam Goreng Original',
                'deskripsi' => 'Ayam goreng bumbu khas',
                'harga' => 25000,
                'gambar' => '1.jpg'
            ],
            [
                'nama' => 'Ayam Goreng Pedas',
                'deskripsi' => 'Ayam goreng dengan sambal spesial',
                'harga' => 27000,
                'gambar' => '2.jpg'
            ],
            [
                'nama' => 'Paket Ayam + Nasi',
                'deskripsi' => 'Ayam + nasi + sambal + lalapan',
                'harga' => 30000,
                'gambar' => '3.jpg'
            ],
        ]);
    }
}
