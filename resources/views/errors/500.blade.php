@extends('layouts.default')
@section('title', '500 - Http Error')

@section('content')
  <div class="jumbotron text-center" style="padding-bottom:0px;">
    <div class="page-header">
      <h1>500 - <small> Http Error</small></h1>
    </div>
    <p>Server Error: 500 (Internal Server Error)</p>
    <p>可能是服务器问题~（如果觉得是bug，就向管理员反馈吧。<del>或者赞助我换个好点的服务器也行w</del>）</p>
    <img style="max-width:250px;" src="{{ asset('/img/error/404.png') }}" alt="一脸智障.png">
  </div>
@stop
