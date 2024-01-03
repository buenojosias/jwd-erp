<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FuelSupply extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'date',
        'company',
        'liters',
        'price',
        'amount'
    ];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
