<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'Wilson Ramirez Z',
            'email' => 'wramirez@sena.edu.co',
            'password' => bcrypt('wramirez1')
        ]);
    }
}
