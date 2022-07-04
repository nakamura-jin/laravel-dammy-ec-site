<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Menu;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'menu_id' => Menu::pluck('id')->random(),
            'quantity' => $this->faker->numberBetween(1, 3)
        ];
    }
}
