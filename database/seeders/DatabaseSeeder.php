<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'username' => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'Test User',
            'password' => bcrypt('test123'),
        ]);

        $this->call([
            CategorySeeder::class,
            AnimalSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
