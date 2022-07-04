<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\User;

class CartUserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            $cart_id = Cart::pluck('id')->random();
            $user_id = User::pluck('id')->random();

            $cart = Cart::find($cart_id);

            $cart->users()->attach($user_id);
        }
    }
}
