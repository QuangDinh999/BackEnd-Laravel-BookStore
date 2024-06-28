<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable = ['ISBN', 'name','amount', 'price', 'author', 'img', 'description',
        'publish_year', 'publisher_id', 'categories_id'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(category::class, 'categories_id');
    }

    public function publisher()
    {
        return $this->belongsTo(publisher::class);
    }

    public function cartitems()
    {
        return $this->hasMany(cartitems::class, 'book_id');
    }
}
