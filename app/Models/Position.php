<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // tabel pivot
    public function employee(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'employee_positions', 'position_id', 'employee_id')->withTimestamp();
    }

}
