<?php

namespace App\Console\Commands;

use App\Tag;
use Illuminate\Console\Command;

class CreateTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ct';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        error_log("creating...");

        for($i = 0 ; $i < count($this->TAGS) ; $i++ )
        {
            $color = $this->COLORS[ $i % count($this->COLORS) ];
            $name =  $this->TAGS[$i] ;

            Tag::create(compact("color","name"));
        }

        error_log("DONE!");

        return 0;
    }
}
