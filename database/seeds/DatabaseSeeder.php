<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            rolesTableSeeder::class,
            userTableSeeder::class,
            subjectTableSeeder::class,
            studentTableSeeder::class,
        ]);
    }
}
