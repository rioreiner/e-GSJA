<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jemaat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jemaat';

    protected $fillable = [
        'nomor_anggota',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
        'email',
        'status_pernikahan',
        'status_keanggotaan',
        'foto',
        'user_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUmurAttribute(): ?int
    {
        return $this->tanggal_lahir?->age;
    }

    public function getFotoUrlAttribute(): string
    {
        if ($this->foto && file_exists(public_path('uploads/foto/' . $this->foto))) {
            return asset('uploads/foto/' . $this->foto);
        }

        return asset('images/default-avatar.png');
    }

    public static function generateNomorAnggota(): string
    {
        $lastJemaat = static::withTrashed()->latest('id')->first();

        $lastId = $lastJemaat
            ? $lastJemaat->id + 1
            : 1;

        return 'JMT-' . str_pad($lastId, 5, '0', STR_PAD_LEFT);
    }

    public function scopeSearch($query, string $search)
    {
        return $query->where(function ($q) use ($search) {

            $q->where('nama_lengkap', 'like', "%{$search}%")
              ->orWhere('nomor_anggota', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('no_telepon', 'like', "%{$search}%");

        });
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['status_keanggotaan'] ?? null, function ($q, $status) {
            $q->where('status_keanggotaan', $status);
        });

        $query->when($filters['jenis_kelamin'] ?? null, function ($q, $jk) {
            $q->where('jenis_kelamin', $jk);
        });

        $query->when($filters['status_pernikahan'] ?? null, function ($q, $sp) {
            $q->where('status_pernikahan', $sp);
        });

        return $query;
    }
}