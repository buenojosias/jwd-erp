<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'recommended_by',
        'name',
        'reference',
        'whatsapp',
        'phone',
        'email'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'recommended_by');
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function receipts(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
