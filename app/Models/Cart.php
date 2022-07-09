<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\User;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'quantity', 'user_id'];

    public function menus() {
        return $this->belongsTo(Menu::class);
    }

    public function users() {
        return $this->hasOne(User::class);
    }
}
