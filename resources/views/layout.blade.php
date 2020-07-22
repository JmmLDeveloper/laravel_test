<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

  <link rel="stylesheet" href="{{ asset("global.css") }}">
  <link rel="stylesheet" href="{{ asset("navbar.css") }}">

  <title> @yield("title") </title>

  @yield("head")

</head>
<body>

  <section>
    <div id="header-bar">
      <h1> Reddit Clone </h1>

      <nav>
        <ul>
          <li><a href="{{route("posts")}}"> Posts </a></li>
          @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form> 
            <li onclick="document.querySelector('#logout-form').submit()"> Logout </li>
            <li><a href={{route("create-post")}}> New Post </a></li>     
            <li><a href={{route("user-posts")}}> Your Posts </a></li>     
          @endauth
          @guest
            <li><a href={{route("login")}}> Login </a></li>
            <li><a href={{route("register")}}> Register </a></li>   
 
          @endguest


        </ul>
      </nav>
    </div>
  </section>

  <main>
    @yield("main-content")
  </main>
</body>
</html>