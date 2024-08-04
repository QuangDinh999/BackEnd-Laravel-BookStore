<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $fillable = ['customer_name', 'customer_phone', 'total_price', 'customer_address',
        'status', 'payment_id', 'order_note', 'customer_id', 'shipping_code', 'admin_id','employee_id'];
    use HasFactory;
}
