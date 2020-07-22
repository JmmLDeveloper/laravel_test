<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{

    private $TAGS = [
        "sports",
        "cars",
        "programming",
        "music",
        "movies",
        "television",
        "health",
        "books",
        "php",
        "react",
        "laravel",
        "animals",
        "dogs",
        "cats",
        "food",
        "cooking",
        "travel",
        "business",
        "school",
        "science",
        "math",
        "technology",
        "videogames"
    ];

    private $COLORS = [
        "#B03A2E",
        "#1F618D",
        "#117A65",
        "#34495E",
        "#E67E22"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < count($this->TAGS); $i++) {
            $color = $this->COLORS[$i % count($this->COLORS)];
            $name =  $this->TAGS[$i];
            Tag::create(compact("color", "name"));
        }

        return 0;
    }
}
