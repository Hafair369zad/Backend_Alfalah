<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function organizationStructure(): HasOne
    {
        return $this->hasOne(OrganizationStructure::class, 'employee_id');
    }

    public function position(): BelongsToMany
    {
        return $this->belongsToMany(Position::class, 'employee_positions', 'employee_id', 'position_id')->withTimestamp();
    }

    public function attendanceEmployee(): HasMany
    {
        return $this->hasMany(AttendanceEmployee::class, 'employee_id');
    }

    public function bisyaroh(): HasMany
    {
        return $this->hasMany(Bisyaroh::class, 'employee_id');
    }

    public function payRollHistory(): HasMany
    {
        return  $this->hasMany(PayRollHistory::class, 'employee_id');
    }

    public function homeroomTeacher(): HasOne
    {
        return $this->hasOne(HomeroomTeacher::class, 'employee_id');
    }

    public function sppTransactions(): HasMany
    {
        return $this->hasMany(SppTransactions::class, 'employee_id');
    }

}
