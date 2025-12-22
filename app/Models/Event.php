<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    protected $fillable = [
        'program_id',
        'title',
        'description',
        'start_datetime',
        'end_datetime',
        'location',
        'max_volunteers',
        'status',
        'requirements',
        'image',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
        'max_volunteers' => 'integer',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function volunteers(): BelongsToMany
    {
        return $this->belongsToMany(Volunteer::class, 'event_volunteer')
            ->withPivot('status', 'notes', 'rating', 'feedback')
            ->withTimestamps();
    }

    public function getVolunteerCountAttribute(): int
    {
        return $this->volunteers()->count();
    }

    public function hasAvailableSlots(): bool
    {
        if (is_null($this->max_volunteers)) {
            return true;
        }
        return $this->volunteer_count < $this->max_volunteers;
    }
}
