<?php

use Illuminate\Database\Seeder;

class studentSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\StudentSubjects::class, 50)->create();
    }
}
