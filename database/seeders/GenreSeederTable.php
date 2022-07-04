<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'name' => '肉料理'
        ]);
        Genre::create([
            'name' => '揚げ物'
        ]);
        Genre::create([
            'name' => '野菜料理'
        ]);
        Genre::create([
            'name' => '定番おつまみ'
        ]);
        Genre::create([
            'name' => 'ごはんもの'
        ]);
    }
}
