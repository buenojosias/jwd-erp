<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'identifier_id',
        'description',
        'date',
        'amount',
        'balance_before',
        'balance_after'
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date:d/m/Y',
            'amount' => 'float',
            'balance_before' => 'float',
            'balance_after' => 'float'
        ];
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public function identifier(): BelongsTo
    {
        return $this->belongsTo(Identifier::class);
    }
}
