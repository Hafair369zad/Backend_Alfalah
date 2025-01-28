<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BalanceMosque extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function incomeMosque(): HasMany 
    {
        return $this->hasMany(IncomeMosque::class, 'balance_id');
    }

    public function expenseMosque(): HasMany
    {
        return $this->hasMany(ExpenseMosque::class, 'balance_id');
    }
}
