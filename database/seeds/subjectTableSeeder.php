<?php

use Illuminate\Database\Seeder;

class subjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subject::class, 50)->create();
    }
}
