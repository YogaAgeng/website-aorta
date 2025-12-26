<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'konten',
        'gambar',
        'kategori',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'target_donasi',
        'donasi_terkumpul',
        'project_leader',
        'user_id',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'target_donasi' => 'decimal:2',
        'donasi_terkumpul' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->slug = Str::slug($project->judul);
            if (auth()->check()) {
                $project->user_id = auth()->id();
            }
            if (empty($project->status)) {
                $project->status = 'draft';
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('judul')) {
                $project->slug = Str::slug($project->judul);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updateDonationAmount($amount)
    {
        $this->donasi_terkumpul += $amount;
        
        // Update status if target is reached
        if ($this->donasi_terkumpul >= $this->target_donasi && $this->status !== 'selesai') {
            $this->status = 'selesai';
        }
        
        $this->save();
        return $this;
    }

    public function isActive()
    {
        return $this->status === 'berlangsung' && 
               $this->tanggal_mulai <= now() && 
               ($this->tanggal_selesai === null || $this->tanggal_selesai >= now());
    }
}
