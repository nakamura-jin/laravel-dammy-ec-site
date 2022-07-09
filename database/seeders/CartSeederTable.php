<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Cart;
use App\Models\Menu;

class CartSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');

        for($i = 1; $i < 10; $i++) {
            Cart::create([
                'user_id' => $i,
                'menu_id' => Menu::pluck('id')->random(),
                'quantity' => $faker->numberBetween(1, 3)
            ]);
        }
    }
}
