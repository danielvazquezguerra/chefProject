<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    return [

        'serves' => $faker->randomDigit,
        'level' => $faker->randomDigit,
        'duration' => $faker->randomDigit,
        'ingredients' => $faker->sentence($nbWords = 3, $variableNbWords = true),

        // $table->integer('serves');
        // $table->enum('level', ['easy', 'medium', 'hard']);
        // $table->integer('duration');
        // $table->string('ingredientes', 140);
    ];
});
