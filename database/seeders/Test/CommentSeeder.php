<?php

namespace Database\Seeders\Test;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory(config('app.seeder.size'))->create();
    }
}
