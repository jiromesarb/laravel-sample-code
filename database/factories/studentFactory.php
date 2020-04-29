<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'contact_number' => $faker->phoneNumber,
        'email' => $faker->email,
        'address' => $faker->address,
    ];
});
