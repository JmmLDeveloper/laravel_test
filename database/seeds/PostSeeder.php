<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
use App\User;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{


    public function run(Faker $faker)
    {
        $tags = Tag::all();
        $users = User::all();
        for($i = 0;$i < 20 ; $i++)
        {   
            $post = new Post([
                'title' => $faker->sentence(16),
                'content' => $faker->sentence(250),
                'likes_count' => 0,
                'dislikes_count' => 0,
                'comments_count' => 0,
            ]);

            $users->random()->posts()->save($post);
            $post->tags()->attach( $tags->random(rand(1,5)) );
            
        }   

    }
}
