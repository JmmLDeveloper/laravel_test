<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use App\User;
use Faker\Generator as Faker;

class CommentSeeder extends Seeder
{
   



    public function run(Faker $faker)
    {
        $users = User::all();
        $posts  = Post::all();

        for($i = 0 ; $i < 100 ; $i++)
        {   
            $comment = new Comment([
                "content" => $faker->text(350)
            ]);
            
            $user = $users->random();
            $post = $posts->random();

            $comment->user()->associate($user);
            $comment->post()->associate($post);
            $comment->save();

            $post->addToCommentCount();
        }
    }
}
