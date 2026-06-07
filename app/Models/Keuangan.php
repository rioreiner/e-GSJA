<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keuangan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'keuangan';

    protected $fillable = [
        'jenis',
        'kategori',
        'jumlah',
        'tanggal',
        'keterangan',
        'user_id',
    ];

    protected $casts = [
        'tanggal'  => 'date',
        'jumlah'   => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePemasukan($query)
    {
        return $query->where('jenis', 'pemasukan');
    }

    public function scopePengeluaran($query)
    {
        return $query->where('jenis', 'pengeluaran');
    }

    public function scopeBulanIni($query)
    {
        return $query->whereYear('tanggal', now()->year)
                     ->whereMonth('tanggal', now()->month);
    }

    public function scopeByMonth($query, int $year, int $month)
    {
        return $query->whereYear('tanggal', $year)
                     ->whereMonth('tanggal', $month);
    }

    public function scopeSearch($query, string $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('kategori', 'like', "%{$search}%")
              ->orWhere('keterangan', 'like', "%{$search}%");
        });
    }

    public static function totalPemasukan(?int $year = null, ?int $month = null): float
    {
        $query = static::pemasukan();
        if ($year) $query->whereYear('tanggal', $year);
        if ($month) $query->whereMonth('tanggal', $month);
        return (float) $query->sum('jumlah');
    }

    public static function totalPengeluaran(?int $year = null, ?int $month = null): float
    {
        $query = static::pengeluaran();
        if ($year) $query->whereYear('tanggal', $year);
        if ($month) $query->whereMonth('tanggal', $month);
        return (float) $query->sum('jumlah');
    }

    public function getJumlahFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->jumlah, 0, ',', '.');
    }
}