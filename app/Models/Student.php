<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function attendanceStudent(): HasMany
    {
        return $this->hasMany(AttendanceStudent::class, 'student_id');
    }

    public function spp(): HasMany
    {
        return $this->hasMany(Spp::class, 'student_id');
    }

    public function sppTransactions(): HasMany
    {
        return $this->hasMany(SppTransactions::class, 'student_id');
    }

}
