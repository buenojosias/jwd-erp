<?php

namespace App\Models;

use App\Enums\StepStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'description',
        'status',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'status' => StepStatusEnum::class,
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
