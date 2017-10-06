@extends('layouts.default')
@section('title', '主页')

@section('content')
  @if (Auth::check())
    <div class="row">
      <aside class="col-md-3">
        <div class="panel panel-default">
          <section class="user_info">
            @include('shared._user_info', ['user' => Auth::user()])
          </section>
          <section class="stats">
            @include('shared._stats', ['user' => Auth::user()])
          </section>
        </div>
      </aside>
      <aside class="col-md-9">
        <div class="panel panel-default">
          <section class="status_form">
            @include('shared._status_form')
          </section>
          <h3>微博列表</h3>
          @include('shared._feed')
        </div>
      </aside>
    </div>
  @else
    <div class="jumbotron text-center">
      <img src="{{ asset('/assets/img/logo/logo.png') }}" alt="Logo" class="img-circle">

      <h1>Hello , Fantasy Star !</h1>

      <p class="lead">
        <h3 class="m-b-30">
            <a href="{{ route('about') }}" data-toggle="tooltip" data-placement="bottom" title="关于我们">幻星科幻协会 - Fantasy Star</a>
        </h3>
        <div class="links m-b-10">
            <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="还没有写简介~">小说部</a>
            <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="还没有写简介~">电影部</a>
            <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="还没有写简介~">科技部</a>
            <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="还没有写简介~">外联部</a>
            <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="还没有写简介~">行政部</a>
        </div>
        <div class="m-b-30">
            <ul class="list-inline">
                <li><a href="mailto:fantasystar@elpsy.cn" target="_blank" data-toggle="tooltip" data-placement="top" title="反馈邮箱：fantasystar@elpsy.cn"><i class="fa fa-envelope"></i></a></li>
                <li><a href="http://weibo.com/u/3784345967?refer_flag=1001030102_&is_all=1" target="_blank" data-toggle="tooltip" data-placement="top" title="微博：上海海事大学幻星科幻协会"><i class="fa fa-weibo"></i></a></li>
                <li><a href="/assets/img/QRcode/WeChat-FantasyStar.png" target="_blank" data-toggle="tooltip" data-placement="top" title="微信公众号：幻星科幻"><i class="fa fa-weixin"></i></a></li>
                <li><a href="https://jq.qq.com/?_wv=1027&k=4E6I6Xl" target="_blank" data-toggle="tooltip" data-placement="top" title="QQ群：182332107"><i class="fa fa-qq"></i></a></li>
                <li><a href="https://github.com/YunYouJun/FantasyStar-Web" target="blank" data-toggle="tooltip" data-placement="top" title="GitHub项目代码"><i class="fa fa-github"></i></a></li>
            </ul>
        </div>

        <div>
          <a class="btn btn-lg btn-info" href="{{ route('signup') }}" role="button" data-toggle="tooltip" data-placement="bottom" title="注册成为会员">幻想，从此处起航</a>
        </div>
      </p>
    </div>
  @endif
@stop
