@extends('layouts.default')
@section('title', '404 - Page Not Found')

@section('content')
  <div class="jumbotron text-center" style="padding-bottom:0px;">
    <div class="page-header">
      <h1>404 - <small> Page Not Found</small></h1>
    </div>
    <p>Sorry, the page you are looking for could not be found.</p>
    <p>没有找到此页面，大概是被外星人偷走了吧~</p>
    <img style="max-width:250px;" src="{{ asset('/img/error/404.png') }}" alt="一脸智障.png">
  </div>
@stop
