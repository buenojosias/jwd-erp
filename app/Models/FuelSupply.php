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
        'invoice_item_id',
        'date',
        'company',
        'liters',
        'price',
        'amount'
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date:d/m/Y',
            'liters' => 'decimal',
            'price' => 'decimal',
            'amount' => 'decimal',
        ];
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function invoiceItem(): BelongsTo
    {
        return $this->belongsTo(InvoiceItem::class);
    }
}
