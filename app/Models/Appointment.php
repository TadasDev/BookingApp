<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'approved',
        'time_slot_id',
        'patient_name',
        'date'
    ];

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
