<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publisher extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phoneNumber'];
    public $timestamps = false;

    public function books()
    {
        return $this->hasMany(book::class);
    }
}
