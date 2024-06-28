<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;

    public function cart()
    {
        return $this->belongsTo(cart::class, 'customer_id');
    }

    protected $fillable = [
        'username',
        'email',
        'password',
        'address',
        'phoneNumber',
        'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
