<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(16),
        'content' => $faker->sentence(250),
        'likes_count' => $faker->numberBetween(0,15),
        'dislikes_count' => $faker->numberBetween(0,15),
        'comments_count' => 0,
    ];
});
