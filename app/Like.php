<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{


    static function createLike($post,$user,$value)
    {
        $like = new Like();

        if($value === "like")
            $like->value = "like";
        else if($value === "dislike")
            $like->value = "dislike";
        else
            throw new Exception("validitation bypassed wrong like value");

            
        $like->user()->associate($user);
        $like->post()->associate($post);

        $like->save();

    }



    function user()
    {
        $this->belongsTo("App\User");
    }

    function post()
    {
        $this->belongsTo("App\Post");
    }

}
