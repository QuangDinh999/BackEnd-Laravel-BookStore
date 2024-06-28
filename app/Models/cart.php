<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(user::class, 'customer_id');
    }

    public function cartitems()
    {
        return $this->hasMany(cartitems::class, 'cart_id');
    }
}
