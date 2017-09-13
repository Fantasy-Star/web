<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <meta name="keywords" content="幻星,fantasystar,幻星科幻协会,上海海事大学幻星科幻协会,科幻社团,科幻协会" />
        <meta name="author" content="云游君" />
        <meta name="description" content="@section('description') Fantasy Star - 幻星科幻协会 是上海海事大学唯一的科幻协会，致力于推广校园科幻文化。 @show" />

        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" media="screen" />
        <link rel="Bookmark" href="/favicon.ico" >

        <!--[if lt IE 9]>
        <script type="text/javascript" src="{{ asset('/assets/H-ui.admin/lib/html5shiv.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/assets/H-ui.admin/lib/respond.min.js') }}"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/H-ui.admin/static/h-ui/css/H-ui.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/H-ui.admin/static/h-ui.admin/css/H-ui.admin.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/H-ui.admin/lib/Hui-iconfont/1.0.8/iconfont.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/H-ui.admin/static/h-ui.admin/skin/default/skin.css') }}" id="skin" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/H-ui.admin/static/h-ui.admin/css/style.css') }}" />
        <!--[if IE 6]>
        <script type="text/javascript" src="{{ asset('/assets/H-ui.admin/lib/DD_belatedPNG_0.0.8a-min.js') }}" ></script>
        <script>DD_belatedPNG.fix('*');</script>
        <![endif]-->

        <title>@yield('title', 'Fantasy Star') - FantasyStar</title>
    </head>

    <body>
        @include('admin.layout._header')

        @include('admin.layout._menu')
        @yield('content')

        @include('admin.layout._footer')
    </body>
</html>