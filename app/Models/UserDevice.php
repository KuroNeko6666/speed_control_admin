<?php

namespace App\Models;

use App\Models\User;
use App\Models\Device;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDevice extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }

    public function scopeFilter($query, array $fillters) {

        $query->when($fillters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('user', function($query) use ($search) {
                $query->where('name', 'like', '%'. $search. '%')
                ->orWhere('email', 'like', '%'. $search. '%')
                ->orWhere('id', 'like', '%'. $search. '%');
            })->orWhereHas('device', function($query) use ($search) {
                $query->where('name', 'like', '%'. $search. '%')
                ->orWhere('address', 'like', '%'. $search. '%')
                ->orWhere('id', 'like', '%'. $search. '%');
            });
        });

    }
}
