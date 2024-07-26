<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'date',
        'description',
        'category',
        'amount',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date:d/m/Y',
            'amount' => 'float'
        ];
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function identifies(): BelongsTo
    {
        return $this->belongsTo(Identifier::class);
    }

    public function fuelSupplies(): HasMany
    {
        return $this->hasMany(FuelSupply::class);
    }
}
