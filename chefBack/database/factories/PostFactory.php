<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [

        'user' => $faker->name,
        'content' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'images' => $faker->imageUrl($width = 640, $height = 480),
        'like' => false,
        
    ];
});
