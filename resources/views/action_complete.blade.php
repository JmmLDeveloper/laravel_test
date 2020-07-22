<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset("global.css") }}">

  <title> @yield("title") </title>

  <style>

    main
    {
      width:100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
    }

    h1
    {
      font-size: 4rem;
      text-align: center;
      margin-bottom: 3rem;
      color: lightgreen;
    }
    


  </style>


  @yield("head")

</head>
<body>

  <main>

    <h1> Action Completed Successfully </h1>

    @yield("message")
  </main>
</body>
</html>