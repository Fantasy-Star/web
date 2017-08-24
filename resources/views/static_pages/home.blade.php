@extends('layouts.default')
@section('title', '主页')

@section('content')
  @if (Auth::check())
    <div class="row">
      <aside class="col-md-3">
        <div class="element-panel">
          <section class="user_info">
            @include('shared._user_info', ['user' => Auth::user()])
          </section>
          <section class="stats">
            @include('shared._stats', ['user' => Auth::user()])
          </section>
        </div>
      </aside>
      <aside class="col-md-9">
        <div class="element-panel">
          <section class="status_form">
            @include('shared._status_form')
          </section>
          <h3>微博列表</h3>
          @include('shared._feed')
        </div>
      </aside>
    </div>
  @else
    <div class="jumbotron">
      <h1>你好，幻想者！</h1>
      <h1>Hello,Fantast！</h1>
      <p class="lead">
        幻星科幻协会 - Fantasy Star
        <br/>
        <a href="http://fantasystar.yunyoujun.cn">http://fantasystar.yunyoujun.cn</a>
      </p>
      <p>
        幻想，从此处起航。
      </p>
      <p>
        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">现在注册</a>
      </p>
    </div>
  @endif
@stop
