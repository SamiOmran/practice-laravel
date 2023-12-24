<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Article::factory(20)->create();

        $admin = User::where('email', 'sami@email.com')->first();

        if (! $admin) {
            User::create([
                'name' => 'ADMIN',
                'email' => 'sami@email.com',
                'password' => '12345678',
                'country' => 'Palestine',
            ]);
        }
    }
}
