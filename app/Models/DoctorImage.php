<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorImage extends Model
{
    use HasFactory;

    protected $table = 'doctors_images';

    protected $fillable = [
        'file_path',
    ];
}
