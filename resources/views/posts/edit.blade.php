@extends('layout')

@section("title","create post")

@section('head')
  <link rel="stylesheet" href="{{ asset("form.css") }}">

  <style>
    h2
    {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 0.4rem;
    }
    select
    {
      font-size: 1.2rem;
      height: 8rem;;
    }

  </style>

@endsection


@section('main-content')

    <form action="{{ route('posts', $post->id ) }}"  method="POST" >
      @csrf
      @method("PUT")
      <h2>create post</h2>
      <div class="field">
          @error("title")
            <p class="error-msg"> {{ $message }} </p>
          @enderror
        <label for="title-input"> title </label>
      <input 
        type="text" 
        id="title-input" 
        name="title" 
        value="{{ $inputValues->title}}"
      >
      </div>


      <div class="field">
        @error("tags")
          <p class="error-msg"> {{ $message }} </p>
        @enderror
        <label for="tags-input"> tags </label>
        <select
          id="tags-input" 
          name="tags[]"
          multiple
        >


          @foreach($tags as $tag)
            <option
              value="{{$tag->id}}"
              {{ in_array( $tag->id  , $inputValues->tags )   ? "selected" : '' }} 
            >{{ $tag->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="field">
          @error("content")
            <p class="error-msg"> {{ $message }} </p>
          @enderror
        <label for="content-input"> Content </label>
        <textarea name="content" id="content-input" cols="30" rows="10">{{$inputValues->content}}</textarea>
      </div>
      <button type="submit"> Create Post </button>

    </form>
@endsection
