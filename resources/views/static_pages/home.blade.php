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
      <img src="{{ asset('/assets/img/logo/logo.png') }}" alt="Logo" class="img-circle" id="logo">

      <h1>Hello , Fantasy Star !</h1>
      <canvas id="canvas" style="position: absolute;top:-40px;left:10px;z-index: 100;"></canvas>
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
          <a id="go" class="btn btn-lg btn-info" href="{{ route('signup') }}" role="button" data-toggle="tooltip" data-placement="bottom" title="注册成为会员">幻想，从此处起航</a>
        </div>
      </p>
    </div>

    <script type="text/javascript">
    	var txt = "幻星科幻协会";
    	var txtH = 24;
    	var font = "Raleway,San Francisco";
    	var rayColor1 = "#111111";
    	var rayColor2 = "#aaaaaa";
    	var rayColor3 = "#909dff";

    	var canvas = document.getElementById("canvas");
    	var ctx = canvas.getContext("2d");
    	// var cw = canvas.width = canvas.parentNode.offsetWidth-120;
    	var cw = canvas.width = window.innerWidth-20;
    	var ch = canvas.height = 300;

    	var w2 = cw/2;
    	var h2 = ch/2;
    	var pi = Math.PI;
    	var pi2 = pi*.5;


    	var txtCanvas = document.createElement("canvas");
    	var txtCtx = txtCanvas.getContext("2d");
    	txtCtx.font = txtH + "px " + font;
    	txtCtx.textBaseline = "middle";
    	var txtW = Math.floor(txtCtx.measureText(txt).width);
    	txtCanvas.width = txtW;
    	txtCanvas.height = txtH*1.5;

    	var gradient = ctx.createRadialGradient(w2, h2, 0, w2, h2, txtW);
    	gradient.addColorStop(0, rayColor3);
    	gradient.addColorStop(.5, rayColor2);
    	gradient.addColorStop(1, rayColor1);
    	ctx.strokeStyle = gradient;

    	txtCtx.fillStyle = gradient;
    	txtCtx.font = txtH + "px " + font;
    	txtCtx.textBaseline = "middle";
    	txtCtx.fillText(txt,0,txtH*.5);

    	//dirty adjust for descends
    	txtH *= 1.5;

    	var bufferCanvas = document.createElement("canvas");
    	bufferCanvas.width = txtW;
    	bufferCanvas.height = txtH;
    	var buffer = bufferCanvas.getContext("2d");

    	//text start position
    	var sx = (cw-txtW)*0.5
    	var sy = (ch-txtH)*0.5

    	////generate data
    	var rays = [];
    	var txtData = txtCtx.getImageData(0,0,txtW,txtH);
    	for (var i = 0; i < txtData.data.length; i+=4) {
    	  var ii = i/4;
    	  var row = Math.floor(ii/txtW)
    	  var col = ii%txtW
    	  var alpha = txtData.data[i+3]
    	  if(alpha !== 0){
    	    var c = "rgba("
    	    c += [txtData.data[i],txtData.data[i+1],txtData.data[i+2], alpha/255 ] 
    	    c += ")";
    	    rays.push(new Ray(Math.floor(ii/txtW), ii%txtW, c));  
    	  }
    	}

    	var current = 0;
    	//start animation
    	// tick();
    	$('#go').hover(function(){
    		tick();
    	});


    	function tick() {
    	  ctx.clearRect(0,0,cw,ch)
    	  ctx.drawImage(bufferCanvas, 0, 0, current, txtH, sx, sy, current, txtH)
    	  ctx.save()
    	  ctx.globalAlpha = .05;
    	  ctx.globalCompositeOperation = "lighter";
    	  if(drawRays(current)){
    	    current++;
    	    current = Math.min(current, txtW)
    	    window.requestAnimationFrame(tick)  
    	  }else{
    	    fadeOut()
    	  }
    	  ctx.restore()
    	}

    	function fadeOut(){
    	  ctx.clearRect(0,0,cw,ch)
    	  ctx.globalAlpha *= .95;
    	  ctx.drawImage(bufferCanvas, 0, 0, current, txtH, sx, sy, current, txtH)
    	  if(ctx.globalAlpha > .01){
    	   window.requestAnimationFrame(fadeOut) 
    	  }else{
    	    window.setTimeout(restart, 500)
    	  }
    	}
    	function restart(){
    	  for(var i = 0; i < rays.length; i++){
    	    rays[i].reset()
    	  }
    	  ctx.globalAlpha = 1
    	  buffer.clearRect(0,0,txtW,txtH)
    	  current = 0;
    	  // tick();
    	}
    	function drawRays(c){
    	  var count = 0;
    	  ctx.beginPath()
    	  for(var i = 0; i < rays.length; i++){
    	    var ray = rays[i];
    	    if(ray.col < c){
    	      count += ray.draw()
    	    }
    	  }
    	  ctx.stroke()
    	  return count !== rays.length;
    	}


    	function Ray(row, col, f){
    	  this.col = col;
    	  this.row = row;
    	  
    	  var xp = sx + col;
    	  var yp = sy + row;
    	  var fill = f;
    	  
    	  var ath = (txtH/1.5) 
    	  
    	  var a = pi2 * (this.row - ath*.5) / ath;
    	  if(a === 0){
    	    a = (Math.random() - .5) * pi2;
    	  }
    	  var da = .02 * Math.sign(a);
    	  
    	  var q = 2*pi * (this.col - txtW*.5) / txtW;
    	  if(q === 0){
    	    q = (Math.random() - .5) * pi;
    	  }
    	  var dq = .02 * Math.sign(q);
    	  
    	  da += (Math.random() - .5) * .005;
    	  var l = 0;
    	  var dl = Math.random()*2 + 2;
    	  
    	  var buffered = false;
    	  
    	  this.reset = function(){
    	    q = 2*pi * (this.col - txtW*.5) / txtW;
    	    a = pi2 * (this.row - ath*.5) / ath;
    	    if(a === 0){
    	      a = -pi2*.5;
    	    }
    	    l = 0;
    	    buffered = false
    	  }
    	  this.draw = function(){
    	    if(l < 0){
    	      if(!buffered){
    	        buffer.fillStyle = fill;
    	        buffer.fillRect(this.col, this.row, 1, 1);
    	        buffered = true
    	      }
    	      return 1;
    	    }else{
    	      ctx.moveTo(xp, yp)
    	      ctx.quadraticCurveTo(xp + Math.cos(q) * l*.5,
    	                        yp + Math.sin(q) * l*.5,
    	                        xp + Math.cos(a) * l,
    	                        yp + Math.sin(a) * l);
    	      a += da;
    	      q += dq;
    	      l += Math.cos(a)*dl;
    	      return 0;
    	    }
    	  }
    	}
    </script>
  @endif
@stop
