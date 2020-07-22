<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    function store(Request $request)
    {
        $post = Post::find($request->post_id);
        $user = Auth::user();

        $request->validate([
            "content" => "required"
        ]);

        $comment = new Comment([
            "content" => $request->content
        ]);

        $comment->post()->associate($post);
        $comment->user()->associate($user);


        $comment->save();
        $post->addToCommentCount();
        return redirect($post->path());
    }
}
