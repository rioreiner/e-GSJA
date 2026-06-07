<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalIbadah extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jadwal_ibadah';

    protected $fillable = [
        'nama_kegiatan',
        'tanggal',
        'waktu',
        'lokasi',
        'pendeta',
        'tema',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function pelayanan()
    {
        return $this->hasMany(Pelayanan::class);
    }

    public function getPelayanByJenisAttribute(): array
    {
        return $this->pelayanan->groupBy('jenis_pelayanan')->toArray();
    }

    public function scopeUpcoming($query)
    {
        return $query->where('tanggal', '>=', now()->toDateString())->orderBy('tanggal');
    }

    public function scopeSearch($query, string $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('nama_kegiatan', 'like', "%{$search}%")
              ->orWhere('pendeta', 'like', "%{$search}%")
              ->orWhere('lokasi', 'like', "%{$search}%")
              ->orWhere('tema', 'like', "%{$search}%");
        });
    }
}