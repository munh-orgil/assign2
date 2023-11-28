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
    protected $attributes = [
        'balance' => 50000,
    ];
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
        'selected_role'
    ];
    protected $casts = [
        'validated_at' => 'datetime',
        'password' => 'hashed',
    ];
    public $timestamps = false;
}
