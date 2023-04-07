<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
            'name' => 'Administrateur',
            'email' => 'test@example.com',
             'password' => bcrypt('password'),
                'phone' => '+12398190255',
                'email_verified_at' => now(),
                'role' => 'ROLE_ADMIN',
                //'status' => 'active',
        ]);
    }
}
