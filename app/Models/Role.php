<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['role_name'];

    public function getRoleNameAttribute(): string
    {
        $roleNames = [
            'admin' => 'Admin',
            'employee' => 'Pegawai',
            'student' => 'Santri',
            'visitor' => 'Pengunjung'
        ];
    
        return $roleNames[$this->role] ?? 'Tidak Diketahui'; 
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
