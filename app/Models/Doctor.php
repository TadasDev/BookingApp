<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'doctor_type_id',
    ];

    public function image(): HasMany
    {
        return $this->hasMany(DoctorImage::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class)->orderBy('time_slot_id');
    }

    public function doctorType()
    {
       return $this->belongsTo(DoctorType::class);
    }
}
