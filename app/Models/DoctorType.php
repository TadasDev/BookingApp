<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorType extends Model
{
    use HasFactory;

    protected $table = 'doctors_types';

    protected $fillable = [
        'name',
    ];
}
