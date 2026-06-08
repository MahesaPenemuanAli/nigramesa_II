<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ulasans()
    {
        return $this->hasMany(Review::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
