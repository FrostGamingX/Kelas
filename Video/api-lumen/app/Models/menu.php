<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    //
    protected $fillable = [
        'idkategori',
        'menu',
        'gambar',
        'harga',
    ];
}
