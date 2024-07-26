<?php

namespace App\Models;

use App\Enums\InvoiceStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'category',
        'company',
        'reference',
        'amount',
        'status',
        'note',
        'due_date',
        'paid_at'
    ];

    protected function casts(): array
    {
        return [
            'status' => InvoiceStatusEnum::class,
            'due_date' => 'date:d/m/Y',
            'paid_at' => 'date:d/m/Y',
        ];
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
