<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
    ];
});
