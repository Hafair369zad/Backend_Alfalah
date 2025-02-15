<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'user_id');
    }

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class, 'user_id');
    }

    public function visitor(): HasOne
    {
        return $this->hasOne(Visitor::class, 'user_id');
    }

    public function isActive(): bool
    {
        return $this->status()->where('status', 'active')->exists();
    }

    public function hasRole(string $role): bool
    {
        return $this->role()->where('role', $role)->exists();
    }
    public function isStudent()
    {
        return $this->hasRole('student');
    }

    public function isEmployee()
    {
        return $this->hasRole('employee');
    }

    public function isVisitor()
    {
        return $this->hasRole('visitor');
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function generalInformation(): HasMany
    {
        return $this->hasMany(GeneralInformation::class, 'author');
    }

    public function event(): HasMany
    {
        return $this->hasMany(Event::class, 'author');
    }

    public function announcement(): HasMany
    {
        return $this->hasMany(Announcement::class, 'author');
    }

    public function article(): HasMany
    {
        return $this->hasMany(Article::class, 'author');
    }


    public function balanceMosque(): HasOne
    {
        return $this->hasOne(BalanceMosque::class, 'created_by');
    }

    public function incomeMosque(): HasMany 
    {
        return $this->hasMany(IncomeMosque::class, 'created_by');
    }

    public function expenseMosque(): HasMany 
    {
        return $this->hasMany(ExpenseMosque::class, 'created_by');
    }

    public function expenseMosqueType(): HasMany 
    {
        return $this->hasMany(ExpenseMosqueType::class, 'created_by');
    }


    public function balanceTpq(): HasOne
    {
        return $this->hasOne(BalanceTpq::class, 'created_by');
    }

    public function incomeTpq(): HasMany 
    {
        return $this->hasMany(IncomeTpq::class, 'created_by');
    }

    public function expenseTpq(): HasMany 
    {
        return $this->hasMany(ExpenseTpq::class, 'created_by');
    }

    public function expenseTpqType(): HasMany 
    {
        return $this->hasMany(ExpenseTpqType::class, 'created_by');
    }

}
