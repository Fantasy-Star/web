@extends('layouts.default')
@section('title', '403 - Forbidden')

@section('content')
  <div class="jumbotron text-center" style="padding-bottom:0px;">
    <div class="page-header">
      <h1>403 - <small> Forbidden</small></h1>
    </div>
    <p>Sorry, the page you are looking for could not be visited.</p>
    <p>多半是访问权限问题，导致页面不可访问。（如果觉得是bug，就向管理员反馈吧。）~</p>
    <img style="max-width:250px;" src="{{ asset('/img/error/404.png') }}" alt="一脸智障.png">
  </div>
@stop
