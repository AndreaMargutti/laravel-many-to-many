<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $typesId = Type::all()->pluck("id");
        //
        for ($i=0; $i < 10; $i++) {
            # code...
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($typesId);
            $newProject->name = $faker->word();
            $newProject->members = $faker->words(3, true);
            $newProject->description = $faker->sentence();
            $newProject->save();
        }
    }
}