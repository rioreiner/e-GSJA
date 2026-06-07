<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Daftarkan semua kolom database agar bisa diisi secara massal (Mass Assignment)
    protected $fillable = [
        'judul', 
        'foto', 
        'kategori', 
        'deskripsi', 
        'is_utama'
    ];

    // Opsional: Otomatis mengubah tipe data is_utama menjadi boolean asli di PHP
    protected $casts = [
        'is_utama' => 'boolean',
    ];
}