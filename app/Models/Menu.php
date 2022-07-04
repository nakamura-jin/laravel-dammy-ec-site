<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Cart;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'genre_id'
    ];

    public function genres() {
        return $this->hasMany(Genre::class);
    }

    public function carts() {
        return $this->belongsTo(Cart::class);
    }
}
