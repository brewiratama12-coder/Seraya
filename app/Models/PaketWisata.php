<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $table = 'paket_wisata';

    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'harga_asli',
        'jenis_paket',
        'status',
        'gambar',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'harga_asli' => 'decimal:2',
    ];
}
