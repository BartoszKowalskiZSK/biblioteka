<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(NasienieAutorzy::class);
        $this->call(NasienieBooks::class);
        $this->call(UsersTableSeeder::class); // Dodane

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('test'), // Hashowanie hasła
            'privillages' => '5', // Zmiana na ciąg znaków
            'amount' => 3
        ]);
    }
}