@extends('layouts.default')
@section('title', '主页')

@section('content')
  <div class="jumbotron">
    <h1>你好，幻想者！</h1>
    <p class="lead">
      幻星科幻协会 - Fantasy Star  &nbsp;
      <a href="http://fantasystar.yunyoujun.cn">http://fantasystar.yunyoujun.cn</a>
    </p>
    <p>
      幻想，从此处起航。
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">注册</a>
    </p>
  </div>
@stop
