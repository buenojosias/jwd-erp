<?php

namespace App\Models;

use App\Enums\KbStudentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KbStudent extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'birth', 'parent', 'whatsapp', 'registration_date', 'status' ];

    protected $casts = [
        'birth' => 'date:d/m/Y',
        'registration_date' => 'date:d/m/Y',
        'status' => KbStudentStatusEnum::class,
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(KbGroup::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(KbPayment::class);
    }
}
