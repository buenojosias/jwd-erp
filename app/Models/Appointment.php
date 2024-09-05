<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'service_id',
        'date',
        'start_time',
        'end_time',
        'period',
        'status',
        'full_day',
        'type',
        'title',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'start_time' => 'time',
            'end_time' => 'time',
            'full_day' => 'boolean',
        ];
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
