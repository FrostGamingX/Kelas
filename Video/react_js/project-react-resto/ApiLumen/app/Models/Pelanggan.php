<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'pelanggan', 'alamat', 'telp', 'email', 'password'
    ];

    protected $hidden = [
        'password',
    ];
}