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
    <div class="jumbotron text-center">
      <img src="/assets/img/logo/logo.png" alt="Logo" class="img-circle">

      <h1>Hello , Fantasy Star !</h1>

      <p class="lead">
        <h3 class="m-b-md">幻星科幻协会 - Fantasy Star</h3>
        <div class="links m-b-md">
            <a href="">Novel</a>
            <a href="">Film</a>
            <a href="">Technology</a>
            <a href="">Communication</a>
            <a href="">Administration</a>
        </div>
        <div class="links m-b-md">
          <a href="http://fantasystar.yunyoujun.cn">Fantasy Star</a>
          <a href="http://www.yunyoujun.cn/">YunYouJun</a>
          <a href="https://github.com/YunYouJun/FantasyStar-Web">GitHub</a>
        </div>
        <div>
          <a class="btn btn-lg btn-info" href="{{ route('signup') }}" role="button">幻想，从此处起航</a>
        </div>
      </p>
    </div>
  @endif
  <!--PC和WAP自适应版-->
  <div class="panel panel-default">
      <div id="SOHUCS" sid="home" ></div>
  </div>
  <script type="text/javascript">
      (function(){
          var appid = 'cytcmrKfy';
          var conf = 'prod_c166102c81bde2ffeca0f02bbb4d6957';
          var width = window.innerWidth || document.documentElement.clientWidth;
          if (width < 960) {
              window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); </script>

@stop
