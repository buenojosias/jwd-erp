<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traffic extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'identifier',
        'destination',
        'initial_km',
        'final_km',
        'distance'
    ];
}
