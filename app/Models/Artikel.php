<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'kategori',
        'penulis',
        'tanggal_terbit',
        'user_id',
    ];

    protected $casts = [
        'tanggal_terbit' => 'date',
        'kategori' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
