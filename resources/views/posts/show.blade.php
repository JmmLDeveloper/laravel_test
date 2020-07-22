@extends('layout')

@section('title',"single post")

@section('head')
  <link rel="stylesheet" href="/form.css">
    <style>
      h2
      {
        font-size: 2.3rem;
        font-weight: 300;
        color: dodgerblue;
        margin-bottom:1rem;
      }

      #post
      {
        position: relative;
        background-color: white;
        border: solid 1px grey;
        border-radius: 0.5rem;
        padding: 1rem;
        margin: 2rem  1rem 1rem;

      }

      h3
      {
        font-size: 1.5rem;
        margin-left: 1rem;
      }

      .comment , form
      {
        background-color: white;
        border: solid 1px grey;
        border-radius: 0.5rem;
        padding: 0.5rem;
        margin: 1rem  1rem;
      }


      .comment .author
      {
        font-size: 0.9rem;
        color: #444;
        font-weight: bold;
        margin-bottom: 0.5rem;
      }

      h4
      {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        margin-top: 0.5rem;
        text-align: center;
      }
      form
      {
        width:90%;
        margin: 0 auto;
        margin-bottom: 2rem;
      }
      textarea
      {
        width: 100%;
      }

      #post .actions
      {
        position: absolute;
        background-color: white;
        top: 0;
        padding: 0.2rem;
        font-size: 1.1rem;
        right: 1rem;
        transform: translateY(-95%);
      }


    </style>
@endsection


@section('main-content')
    <div id="post">
      <h2> {{$post->title}} </h2>
      <p> {{ $post->content }} </p>

      <div class="actions">
        <a href="{{route("edit-post",$post->id)}}"> editar </a>
        <a> borrar </a>
      </div>
    </div>
    <h3> Comments </h3>
    <ul>
      @foreach ($post->comments as $comment)
          <div class="comment">
            <div class="author"> 
              {{ $comment->user->username }}
            </div>
            <div class="body">
              {{$comment->content}}
            </div>
          </div>
      @endforeach
    </ul>
    
    @auth
      <form action="/comments"  method="POST" >
        @csrf
        <h4>Make a Comment </h4>
      <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="field">
            @error("content")
              <p style="text-align: center" class="error-msg"> {{ $message }} </p>
            @enderror
        <textarea name="content" id="content-input" cols="30" rows="10">{{old("content")}}</textarea>
        </div>
        <button type="submit"> Send Comment </button>
      </form>
    @endauth




@endsection