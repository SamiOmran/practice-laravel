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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $articlesDirPath = 'app/public/articles';
        if (Storage::exists($articlesDirPath)) {
            Storage::deleteDirectory($articlesDirPath);
            Storage::makeDirectory($articlesDirPath);
        }

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

        // sql command to update user's article_count
        DB::select('
            update users  
            set articles_count = (
            select count(author) from articles 
            where users.id = articles.author)
        ');
    }
}
