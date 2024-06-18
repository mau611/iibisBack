<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        for ($i = 0; $i <= 25; $i++) {
            User::factory()->create([
                'name' => 'User: ' . $i,
                'email' => 'test' . $i . '@example.com',
                'rol' => 'investigador',
            ]);
        }
    }
}
