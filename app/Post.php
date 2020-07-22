<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "title",
        "content"
    ];

    protected $attributes = [
        'likes_count' => 0,
        'dislikes_count' => 0,
        'comments_count' => 0
    ];

    function path()
    {
        return route("post",$this->id);
    }

    function comments()
    {
        return $this->hasMany("App\Comment");
    }

    function tags()
    {
        return $this->belongsToMany("App\Tag")->withTimestamps();
    }

    function user()
    {
        return $this->belongsTo("App\User");
    }

    function addToCommentCount()
    {
        $this->comments_count = $this->comments_count + 1;
        $this->save();
    }

    function likes()
    {
        return $this->hasMany("App\Likes");
    }

}
