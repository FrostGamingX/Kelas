<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    // Jika ada cookie yang tidak ingin dienkripsi, daftarkan di sini
    protected $except = [
        //
    ];
}
