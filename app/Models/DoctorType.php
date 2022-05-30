<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DoctorType extends Model
{
    use HasFactory;

    protected $table = 'doctor_types';

    protected $fillable = [
        'name'
    ];

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    public function type(): HasOne
    {
        return $this->hasOne(Doctor::class);
    }

}
