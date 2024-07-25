<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KbPayment extends Model
{
    protected $fillable = [ 'kb_student_id', 'reference', 'due_date', 'payment_date', 'payment_method' ];

    protected $casts = [
        'amount' => 'decimal',
        'due_date' => 'date:d/m/Y',
        'payment_date' => 'date:d/m/Y',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(KbStudent::class);
    }

    use HasFactory;
}
