<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SppPayment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function spp(): BelongsTo
    {
        return $this->belongsTo(Spp::class, 'spp_id');
    }

    public function sppTransaction(): HasMany
    {
        return $this->hasMany(SppTransaction::class, 'payment_id');
    }
    
}
