<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class studentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Student::class, 50)->create();

        // $faker = faker::create();
        //
        // $student_data = [];
        // for($x = 0; $x < 50; $x++){
        //     $student_data[] = [
        //         'name' => $faker->name,
        //         'contact_number' => $faker->phoneNumber,
        //         'email' => $faker->email,
        //         'address' => $faker->address,
        //     ];
        // }
        //
        // App\Student::insert($student_data);
    }
}
