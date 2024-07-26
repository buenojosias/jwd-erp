<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Traffic extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier_id',
        'date',
        'time',
        'destination',
        'initial_km',
        'final_km',
        'distance'
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date:d/m/Y',
            'time' => 'time',
            'initial_km' => 'decimal',
            'final_km' => 'decimal',
            'distance' => 'decimal'
        ];
    }

    public function identifier(): BelongsTo
    {
        return $this->belongsTo(Identifier::class);
    }
}
