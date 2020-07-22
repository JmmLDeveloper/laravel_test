<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        "content"
    ];

    function post()
    {
        return $this->belongsTo("App\Post");
    }

    function user()
    {
        return $this->belongsTo("App\User");
    }

}
