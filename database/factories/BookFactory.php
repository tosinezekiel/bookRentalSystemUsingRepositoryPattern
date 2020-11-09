<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 30),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'author' => $faker->name,
        'published_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'image' => 'https://placeimg.com/100/100/any?' . rand(1, 100)
    ];
});
