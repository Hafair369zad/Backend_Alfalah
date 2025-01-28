<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'status_id');
    }
}
