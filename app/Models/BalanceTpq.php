<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BalanceTpq extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function incomeTpq(): HasMany
    {
        return $this->hasMany(IncomeTpq::class, 'balance_id');
    }

    public function expenseTpq(): HasMany
    {
        return $this->hasMany(ExpenseTpq::class, 'balance_id');
    }
}
