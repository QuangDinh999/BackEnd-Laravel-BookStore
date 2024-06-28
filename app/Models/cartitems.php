<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartitems extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'cart_id', 'book_id'];
    public $timestamps = false;

    public function cart()
    {
        return $this->belongsTo(cart::class, 'cart_id');
    }

    public function book()
    {
        return $this->belongsTo(book::class, 'book_id');
    }
}
