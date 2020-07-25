<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Default User
        App\User::create([
            'name' => 'Sample Account',
            'email' => 'sample@sample.com',
            'password' => bcrypt('Password123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Create Sample Users
        factory(App\User::class, 10)->create();
    }
}
