<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        "name",
        "color"
    ];

    function posts()
    {
        return $this->belongsToMany("App\Post")->withTimestamps();
    }
}
