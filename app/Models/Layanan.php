<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'nama_paket',
        'jenis',
        'harga',
        'estimasi',
        'deskripsi',
    ];
}