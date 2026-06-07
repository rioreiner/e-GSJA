<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_event',
        'tanggal',
        'lokasi',
        'deskripsi',
        'banner',
        'user_id',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relasi ke data User / Admin pembuat event
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ACCESSOR UTAMA: $event->banner_url
     * Otomatis melacak lokasi fisik gambar dari admin secara cerdas
     */
    public function getBannerUrlAttribute(): string
    {
        if (!$this->banner) {
            return '';
        }

        // 1. Jika file berupa URL eksternal utuh (HTTP / HTTPS)
        if (Str::startsWith($this->banner, ['http://', 'https://'])) {
            return $this->banner;
        }

        // 2. Cek apakah ada di folder public/uploads/banner/
        if (file_exists(public_path('uploads/banner/' . $this->banner))) {
            return asset('uploads/banner/' . $this->banner);
        }

        // 3. Cek apakah ada di folder public/uploads/events/
        if (file_exists(public_path('uploads/events/' . $this->banner))) {
            return asset('uploads/events/' . $this->banner);
        }

        // 4. Default fallback ke Laravel Storage link symlink
        return asset('storage/' . $this->banner);
    }

    /**
     * ALIAS ACCESSOR: $event->gambar_url
     * Menghubungkan panggilan 'gambar_url' dari Blade langsung ke fungsi 'banner_url' di atas
     */
    public function getGambarUrlAttribute(): string
    {
        return $this->banner_url;
    }

    /**
     * Menguji apakah status event masih akan datang atau hari ini
     */
    public function getIsUpcomingAttribute(): bool
    {
        return $this->tanggal->isFuture() || $this->tanggal->isToday();
    }

    /**
     * SCOPE: Mengambil data event mendatang
     */
    public function scopeUpcoming($query)
    {
        return $query->where('tanggal', '>=', now()->toDateString())->orderBy('tanggal');
    }

    /**
     * SCOPE: Mengambil data dokumen event yang telah lewat
     */
    public function scopePast($query)
    {
        return $query->where('tanggal', '<', now()->toDateString())->orderByDesc('tanggal');
    }

    /**
     * SCOPE: Fitur pencarian kata kunci event
     */
    public function scopeSearch($query, string $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('nama_event', 'like', "%{$search}%")
              ->orWhere('lokasi', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%");
        });
    }
}