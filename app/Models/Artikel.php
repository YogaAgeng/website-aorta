<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'konten',
        'gambar',
        'kategori',
        'penulis',
        'draft',
        'tanggal_terbit',
        'views',
        'user_id',
    ];

    protected $casts = [
        'draft' => 'boolean',
        'tanggal_terbit' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            $artikel->slug = Str::slug($artikel->judul);
            if (auth()->check()) {
                $artikel->user_id = auth()->id();
            }
            if ($artikel->draft === false && !$artikel->tanggal_terbit) {
                $artikel->tanggal_terbit = now();
            }
        });

        static::updating(function ($artikel) {
            if ($artikel->isDirty('judul')) {
                $artikel->slug = Str::slug($artikel->judul);
            }
            if ($artikel->isDirty('draft') && $artikel->draft === false && !$artikel->tanggal_terbit) {
                $artikel->tanggal_terbit = now();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
