<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="keywords" content="幻星,幻星科幻,fantasystar,幻星科幻协会,上海海事大学幻星科幻协会,科幻社团,科幻协会,fantasy-star" />
    <meta name="author" content="云游君" />
    <meta name="description" content="@section('description') Fantasy Star - 幻星科幻协会 是上海海事大学唯一的科幻协会，致力于推广校园科幻文化。 @show" />

    <title>@yield('title', 'Fantasy Star') | FantasyStar</title>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" media="screen" />
    <link rel="Bookmark" href="/favicon.ico" >

    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/fantasystar.css">
    <script src="{{ asset('/assets/js/lib/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
  </head>
  <body>
    <script src="{{ asset('/assets/js/lib/three.min.js') }}"></script>
    <script src="{{ asset('/assets/js/dot/dots.js') }}"></script>

    <div class="bg-image"></div>

    @include('layouts._header')

    <div class="main container">
        @include('shared._messages')
        @yield('content')
    </div>

    @include('layouts._footer')

    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/fantasystar.js') }}"></script>
    <script type="text/javascript">
        function browserRedirect() {
            var sUserAgent = navigator.userAgent.toLowerCase();
            var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
            var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
            var bIsMidp = sUserAgent.match(/midp/i) == "midp";
            var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
            var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
            var bIsAndroid = sUserAgent.match(/android/i) == "android";
            var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
            var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
            // document.writeln("您的浏览设备为：");
            if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
                // document.writeln("phone");
            } else {
                // document.writeln("pc");
                var canvas_nest = '<script type="text/javascript" color="255,255,255" opacity="0.8" zIndex="-2" count="33" src="//cdn.bootcss.com/canvas-nest.js/1.0.1/canvas-nest.min.js"><\/script>';
                $('body').append(canvas_nest);
            }
        }
        browserRedirect();
    </script>
    @yield('scripts')
  </body>
</html>
