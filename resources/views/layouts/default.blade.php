<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title', 'Fantasy Star') - FantasyStar</title>

    <link rel="shortcut icon" type="image/x-icon" href="/img/logo/favicon.ico" media="screen" />
    <link rel="Bookmark" href="/img/logo/favicon.ico" >

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
        @include('shared._messages')
        @yield('content')
    </div>

    @include('layouts._footer')

    <script src="/js/app.js"></script>
    <script src="https://use.fontawesome.com/10eb5b5549.js"></script>
    <script type="text/javascript" color="255,255,255" opacity='0.8' zIndex="-2" count="33" src="//cdn.bootcss.com/canvas-nest.js/1.0.1/canvas-nest.min.js"></script>
  </body>
</html>
