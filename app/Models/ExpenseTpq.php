<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpenseTpq extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function balanceTpq(): BelongsTo
    {
        return $this->belongsTo(BalanceTpq::class, 'balance_id');
    }

    public function expenseTpqType(): BelongsTo
    {
        return $this->belongsTo(ExpenseTpqType::class, 'expensetype_id');
    }
}
