@extends('layouts.default')
@section('title', '帮助')

@section('content')
  <div class="jumbotron" style="padding-bottom:0px;">
    <div class="page-header">
      <h1> <i class="fa fa-question-circle text-primary"></i> 帮助 <small>Fantasy Star</small></h1>
    </div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#identiy" aria-expanded="true" aria-controls="collapseOne">
              #1 如何进行社员身份认证？
            </a>
          </h4>
        </div>
        <div id="identiy" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            目前只是我自己的初步设想啦，直接通过支付宝转账交社费打备注，然后网站后台对用户的身份进行认证。
            <br>
            不过貌似不大可能实行。
            <br>
            暂时想着，群里面直接找我确认就好。
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#gravatar" aria-expanded="false" aria-controls="collapseTwo">
              #2 如何设置自己的头像？
            </a>
          </h4>
        </div>
        <div id="gravatar" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body">
            <h2><small>头像采用</small> <a href="http://cn.gravatar.com/" target="_blank">Gravatar</a> <small>服务</small></h2>
            <p>
              以便节约服务器资源，以及方便使用<small>（<del>才不是我懒得写这方面功能呢！</del>）</small>
            </p>

            <br>
            <h3><a href="https://baike.baidu.com/item/Gravatar" target="_blank">什么是Gravatar?（百度百科）</a></h3>
            <br>

            <h3>使用方法</h3>
            <ul>
              <li>使用你在本网站的注册邮箱，至<a href="http://cn.gravatar.com/" target="_blank">Gravatar官网</a>注册属于自己的帐号。</li>
              <li>在Gravatar官网，上传自己的头像即可。</li>
              <li>修改头像也是同样原理，只需要修改Gravatar官网上自己的头像。</li>
              <li>记得刷新！</li>
            </ul>

            <br>

            <h4>简而言之，本网站头像将与你在Gravatar上的头像保持一致。<small>（通过你注册时使用的邮箱）</small></h4>

            <br>

            <div class="col-sm-offset-2 col-sm-8">
              <a href="http://cn.gravatar.com/" target="_blank">
                <button type="submit" class="btn btn-primary btn-block btn-lg">修改头像</button>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              #3 还没想好写什么……
            </a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
            ……
          </div>
        </div>
      </div>
    </div>

    <blockquote>
      有什么问题的话，可以在本页的评论中进行提问。
    </blockquote>

    <div class="text-center">
      <img style="max-width:250px;" src="{{ asset('/assets/img/yunyoujun/daze.png') }}" alt="一脸智障.png">
    </div>
  </div>

  <!--PC和WAP自适应版-->
  <div class="panel panel-default col-md-12">
    <div id="SOHUCS" sid="help" ></div>
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
