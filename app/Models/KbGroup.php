<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KbGroup extends Model
{
    use HasFactory;

    protected $fillable = ['weekday', 'time'];

    protected $casts = ['time' => 'time'];

    public function students(): HasMany
    {
        return $this->hasMany(KbStudent::class);
    }
}
