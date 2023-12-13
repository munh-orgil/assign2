<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = [
        'email',
        'reg_no',
        'last_name',
        'first_name',
        'address',
        'phone_no',
        'role',
        'is_valid',
        'balance',
        'validated_at',
    ];
    protected $hidden = [
        'password',
        'selected_role',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function books()
    {
        return $this->belongsToMany(Book::class, "book_user")->withPivot("status", "expire_at", "received_at");
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['user'] ?? false) {
            $query->where('email', 'like', '%' . request('user') . '%')
                ->orWhere('reg_no', 'like', '%' . request('user') . '%')
                ->orWhere('phone_no', 'like', '%' . request('user') . '%');
        }
    }
}
