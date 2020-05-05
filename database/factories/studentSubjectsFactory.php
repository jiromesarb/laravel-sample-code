<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\StudentSubjects::class, function (Faker $faker) {

    $students = App\Student::pluck('id'); // get all id of students
    $subjects = App\Subject::pluck('id'); // get all id of subjects

    return [
        'student_id' => $faker->randomElement($students),
        'subject_id' => $faker->randomElement($subjects),
    ];
});
