<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge' />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BoolBnb classe11-team7</title>
    <link rel="icon" href="uploads/images/airbnb_logo.png">

    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">
    <script src="{{ asset('js/search.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>

    @include ('header')


    @include('searchbar')


    @include('welcome-section')


    @include('footer')

  </body>
</html>
