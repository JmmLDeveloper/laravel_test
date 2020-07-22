<?php

namespace App\Http\Controllers;

use App\Post;
use App\Rules\AtLeastOneTag;
use App\Rules\Holy;
use App\Rules\TagSelection;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        
        $tag   =  Tag::where("name",$request->tag)->first();
        if($tag === null)
            $posts = Post::paginate(10);
        else
            $posts = $tag->posts;


        return view("posts.index",compact("posts","tag"));
    }

    public function create()
    {
        return view("posts.create",[
            "tags" => DB::table("tags")->orderBy("name")->get()
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            "title" => "required|min:6",
            "content"=> "required",
            "tags" => ["required",new TagSelection]
        ]);

        
        $post =  new Post($request->all());

        Auth::user()->posts()->save($post);
        $post->tags()->attach($request->tags);
        
        
        

        return view("posts.create_success");
    }


    public function show(Post $post)
    {

        return view("posts.show",compact("post"));
    }

    public function edit(Request $request,Post $post)
    {
        $inputValues = new stdClass;

        $inputValues->title =   trim($request->old("title")) ? $request->old("title") : $post->title;
        $inputValues->content = trim($request->old("content")) ? $request->old("title") : $post->content;
        if( $request->old("tags") )
            $inputValues->tags = old("tags");
        else
            $inputValues->tags = array_map( function ($tag) {  return $tag["id"];}  ,$post->tags->toArray());

        return view("posts.edit",[
            "tags" => DB::table("tags")->orderBy("name")->get(),
            "post" => $post,
            "inputValues" => $inputValues
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => "required|min:6",
            "content"=> "required",
            "tags" => ["required",new TagSelection]
        ]);

        
        $post->tags()->detach( $post->tags);

        $post =  $post->fill($request->all());
        
        $post->tags()->attach($request->tags);
        
        $post->save();


        return view("posts.create_success");
    }

    public function destroy(Post $post)
    {
        
    }

    public function userPosts(Request $request)
    {
        $posts = Auth::user()->posts;

        $tag   =  Tag::where("name",$request->tag)->first();
        if($tag !== null)
            $posts = $posts->filter(function($post) use ($tag) {
                return  $post->tags->where("id",$tag->id)->isNotEmpty();
            });
        $user_posts = true;
        return view("posts.index",compact("posts","tag","user_posts"));
    }
}
