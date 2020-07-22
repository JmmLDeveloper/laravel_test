<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Comment::class, function (Faker $faker) {


    $post = $faker->randomElement( Post::all());

    $post->comments_count = $post->comments_count + 1;
    
    $post->save();

    return [
        'content' => $faker->text(140) ,
        'post_id' => $post->id
    ];
});
