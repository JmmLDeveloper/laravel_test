@extends('layout')

@section("title","Posts")

@section('head')
  <style>
    .post-preview
    {
      
    }

    #links
    {
      width:50%;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
    }

    .post-preview .title
    {
      text-align: flex-start;
      font-size: 1.5rem;
      padding: 0.5rem;
      padding-bottom: 0;
    }

    h2
    {
      font-size: 2.3rem;
      font-weight: 300;
      margin: 1rem 2rem;
      color: dodgerblue
    }

    .post-preview
    {
      display: flex;
      flex-direction: column;
      background: white;
      border:solid grey 1px;
      border-radius: 0.5rem;
      margin: 1rem  1rem;
    }

    .post-data
    {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      margin: 0.5rem;



    }
    
    .likes-comments-counter
    {
      display: flex;
      flex-direction: row;
      justify-content: flex-start;
      align-items: center;
    }

    .likes-comments-counter span
    {
      font-size: 0.9rem;
      display: flex;
      flex-direction: row;
      justify-content: flex-start;
      align-items: center;
    }
    .likes-comments-counter span.material-icons
    {
      margin: 0 0.5rem;
    }


    .post-preview .date
    {
      font-size: 0.9rem;
      color: grey;
    }

    .tags
    {
      border-top: 2px solid rgba(68, 68, 68, 0.39);
      padding: 0.2rem;
    }

    .tag
    {
      display: inline-block;
      padding: 0.3rem;
      margin: 0.3rem 0.2rem;
      color: white;
      border-radius: 0.5rem;
      font-size: 0.9rem;
      font-weight: lighter;
    }

    .tag-title
    {
      font-size: 2rem;
      font-weight: bold;
    }

    .tag-title::before
    {
      content: ': ';
      font-size: 2.3rem;
      color: black;
      font-weight: 100;
    }

    .page-links
    {
      display: flex;
      width:50%;
      margin: 2rem auto;
      flex-direction: row;
    }

    .page-links a
    {
      padding: 0.2rem 0.8rem;
      font-size: 1.2rem;
      color: white;
      background-color: dodgerblue;
      border-radius: 0.5rem;
    }


    .page-links.one
    {
      justify-content: center;
    }

    .page-links.two
    {
      justify-content: space-between;
    }

  </style>
@endsection

@section('main-content')
    <div>
      <h2> 
        <span>Posts</span>
        @if(isset($tag))
        <span class="tag-title" style="color: {{$tag->color}}">{{ $tag->name }}</span>
        @endif
      </h2>
      <ul>
        @forelse ($posts as $post)
          <li>
            @include("partials.post-preview")
          </li>
        @empty
            <p>there is not elementss yet</p>
        @endforelse
      </ul>
        @if($posts->currentPage() === 1)
          <div class="page-links one">
            <a href="{{ $posts->path() . "?page=" . ($posts->currentPage() + 1) }}">Next Page</a>
          </div>
        @elseif($posts->currentPage() === $posts->lastPage())
          <div class="page-links one">
            <a href="{{ $posts->path() . "?page=" . ($posts->currentPage() - 1) }}">Prev Page</a>
          </div>
        @else
          <div class="page-links two">
            <a href="{{ $posts->path() . "?page=" . ($posts->currentPage() - 1) }}">Prev Page</a>
            <a href="{{ $posts->path() . "?page=" . ($posts->currentPage() + 1) }}">Next Page</a>
          </div>
        @endif

    </div>
@endsection