<?php

namespace App\Models;

use App\Enums\KbQueueStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbQueue extends Model
{
    use HasFactory;

    protected $fillabel = [
        'name',
        'age',
        'kin',
        'whatsapp',
        'request_date',
        'avaliable_weekdays',
        'avaliable_periods',
        'status',
        'origin'
    ];

    protected function casts()
    {
        return [
            'age' => 'integer',
            'request_date' => 'date:d/m/Y',
            'avaliable_weekdays' => 'array',
            'avaliable_periods' => 'array',
            'status' => KbQueueStatusEnum::class,
        ];
    }
}
