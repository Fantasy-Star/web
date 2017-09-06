@extends('layouts.default')
@section('title', 'BUG反馈区')

@section('content')
  <div class="jumbotron" style="padding-bottom:0px;">
    <div class="page-header">
      <h1> <i class="fa fa-bug text-danger"></i> BUG反馈区 <small>Fantasy Star</small></h1>
    </div>

    <p>
      因为是业余水平加业余时间开发的东西，所以大概并没有什么<del>卵</del>用。
      自己一个人实力有限，精力有限，现存 <i class="fa fa-bug text-danger">Bug</i> 大概很多，并且许多预想功能也尚在施工中，所以现在基本是个半吊子东西。
      <br>
    </p>

    <p class="text-center">
      那么如果您发现有什么 <i class="fa fa-bug text-danger">Bug</i> 以及不足之处都请告诉我。<strong>Orz 在此拜谢！</strong>
      <br>
      <small>当然还是请写清具体的情形（诸如发生页面与操作原因等）</small>
      <br>
      <img style="max-width:250px;" src="/assets/img/yunyoujun/Orz.png" alt="Orz">
    </p>

  </div>

  <!--PC和WAP自适应版-->
  <div class="panel panel-default col-md-12">
    <div id="SOHUCS" sid="bug" ></div>
  </div>
  <script type="text/javascript">
      (function(){
          var appid = 'cytcmrKfy';
          var conf = 'prod_c166102c81bde2ffeca0f02bbb4d6957';
          var width = window.innerWidth || document.documentElement.clientWidth;
          if (width < 960) {
              window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })();
  </script>

@stop
