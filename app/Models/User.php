<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\UserDevice;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_email_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function device()
    {
       return $this->hasMany(UserDevice::class, "user_id");
    }


    public function scopeFilter($query, array $fillters) {
        $query->when($fillters['role'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('role', $search);
            });
        });

        $query->when($fillters['verified'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('is_email_verified', $search);
            });
        });

        $query->when($fillters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('id', 'like', '%'. $search. '%')
                ->orWhere('name', 'like', '%'. $search. '%')
                ->orWhere('email', 'like', '%'. $search. '%');
            });
        });
    }
}
