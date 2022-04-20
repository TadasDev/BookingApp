<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'active'
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class)->orderBy('date');
    }

}
