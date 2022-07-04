<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->realText(),
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->randomNumber(3),
            'genre_id' => Genre::pluck('id')->random()
        ];
    }
}
