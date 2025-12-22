<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Volunteer extends Model
{
    protected $fillable = [
        'user_id',
        'skills',
        'interests',
        'occupation',
        'experience',
        'availability',
        'has_vehicle',
        'has_license',
        'emergency_contact',
    ];

    protected $casts = [
        'has_vehicle' => 'boolean',
        'has_license' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_volunteer')
            ->withPivot('status', 'notes', 'rating', 'feedback')
            ->withTimestamps();
    }
}
