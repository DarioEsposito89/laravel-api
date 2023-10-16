<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = ["HTML", "CSS", "SCSS", "BOOTSTRAP", "TAILWIND", "JAVA SCRIPT", "JAVA", "NODE.JS", "VUE", "VITE", "ANGULAR", "REACT", "JQUERY", "QUASAR", "PHP", "LARAVEL", "PYTHON", "C#", "C++", "TYPE SCRIPT", "GO", "SWIFT", "RUBY"];

        foreach ($technologies as $technology) {
            Technology::create([
                "name"=> $technology,
                "color" => $faker->rgbColor(),
                ]
            );
        }
    }
}