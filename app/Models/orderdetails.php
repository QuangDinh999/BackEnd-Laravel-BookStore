<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetails extends Model
{
    protected $fillable = ['unit_price', 'amount', 'book_id', 'order_id'];
    use HasFactory;
}
