@extends('action_complete')

@section("title","creation completed")

@section('head')
  <style>
    p 
    {
      font-size: 1.5rem;
      color: #555;
      text-align: center
    } 
  </style>
@endsection


@section('message')
    <p> a new post was created please revisit the index page or any other to see you changes applied </p>
@endsection