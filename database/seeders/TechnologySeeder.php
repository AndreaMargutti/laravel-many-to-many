<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $technologyNames = [
            "HTML",
            "CSS",
            "Bootstrap",
            "Javascript",
            "VueJs",
            "PHP",
            "MySQL",
            "Laravel"
        ];

        foreach ($technologyNames as $name) {
            # code...
            $technology = new Technology();
            $technology->name = $name;
            $technology->color = $faker->hexColor();
            $technology->save();
        }
    }
}