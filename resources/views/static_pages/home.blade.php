@extends('layouts.default')
@section('title', '主页')

@section('content')
  @if (Auth::check())
    <div class="row">
      <div class="col-md-8">
        <section class="status_form">
          @include('shared.status_form')
        </section>
        <h3>微博列表</h3>
        @include('shared.feed')
      </div>
      <aside class="col-md-4">
        <section class="element-panel">
          <section class="user_info">
            @include('shared.user_info', ['user' => Auth::user()])
          </section>
          <section class="stats">
            @include('shared.stats', ['user' => Auth::user()])
          </section>
        </section>
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
