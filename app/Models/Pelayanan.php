<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelayanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pelayanan';

    protected $fillable = [
        'jadwal_ibadah_id',
        'nama_pelayan',
        'jenis_pelayanan',
    ];

    public const JENIS_PELAYANAN = [
        'Singer',
        'Musik',
        'Multimedia',
        'Usher',
    ];

    public function jadwalIbadah()
    {
        return $this->belongsTo(JadwalIbadah::class, 'jadwal_ibadah_id');
    }
}