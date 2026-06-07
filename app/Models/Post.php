<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'author',
        'status',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = static::generateUniqueSlug($post->judul);
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('judul') && empty($post->slug)) {
                $post->slug = static::generateUniqueSlug($post->judul);
            }
        });
    }

    public static function generateUniqueSlug(string $judul): string
    {
        $slug = Str::slug($judul);
        $count = static::where('slug', 'like', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGambarUrlAttribute(): string
    {
        if ($this->gambar && file_exists(public_path('uploads/gambar/' . $this->gambar))) {
            return asset('uploads/gambar/' . $this->gambar);
        }
        return asset('images/default-news.jpg');
    }

    public function getSingkatIsiAttribute(): string
    {
        return Str::limit(strip_tags($this->isi), 150);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeSearch($query, string $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('judul', 'like', "%{$search}%")
              ->orWhere('author', 'like', "%{$search}%")
              ->orWhere('isi', 'like', "%{$search}%");
        });
    }
}