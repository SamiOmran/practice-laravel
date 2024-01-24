<?php

namespace Database\Seeders\Test;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory(config('app.seeders.data'))->create();
    }
}
