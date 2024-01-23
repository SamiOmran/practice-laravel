<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\Test\{
    ArticleSeeder,
    CommentSeeder,
    UserSeeder,
};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
        ]);

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
