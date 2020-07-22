<?php

use App\Comment;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            CommentSeeder::class
        ]);
    }
}
