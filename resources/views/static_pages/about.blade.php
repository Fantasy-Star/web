@extends('layouts.default')
@section('title', '关于')

@section('content')
  <div class="jumbotron">
    <div class="page-header">
      <h1>关于 <small>Fantasy Star</small></h1>
    </div>

    <h2>社团简介</h2>
    <p>
      幻星科幻协会成立于2014年春，是上海海事大学唯一的校级幻想文学类社团，隶属于上海高校科幻联盟科幻苹果核，立足于中远图书馆，向广大幻迷们传播科幻文化，提供交流科幻小说，科幻电影，展望先进技术的幻想平台，同时主办与承办了“幻星杯科幻征文赛”“上海高校幻想节”“世界观构建大赛”等活动，幻星欢迎各位科幻爱好者的加入。
    </p>

    <hr>
    百度百科词条：
    <a target="blank" href="https://baike.baidu.com/item/%E4%B8%8A%E6%B5%B7%E6%B5%B7%E4%BA%8B%E5%A4%A7%E5%AD%A6%E5%B9%BB%E6%98%9F%E7%A7%91%E5%B9%BB%E5%8D%8F%E4%BC%9A/17674300?fr=aladdin">
      上海海事大学幻星科幻协会
    </a>

    <hr>

    <h2>网站简介</h2>
    <p>
      某家伙业余开发的社团官方网站，至于能否实用，尚不可知。
      <br>
      实力有限，精力有限，残留Bug大概很多，许多预想功能尚在施工中，敬请期待啦！
      <br>
    <blockquote>
      <h4>使用技术：</h4>
      <ul>
        <li>后端框架： Laravel 5.5</li>
        <li>前段框架： Bootstrap</li>
        <li>开发环境： Homestead</li>
        <li>线上环境： LNMP</li>
        <li>开发语言： Php(>=7.0) & Html & Css & Javascript</li>
        <li>云服务器： 阿里云 Linux Ubuntu 16.0.4</li>
        <li>数据库： MariaDB 10.1.23</li>
      </ul>
    </blockquote>
    </p>

    <hr>
    <i class="fa fa-github"></i> GitHub (项目源代码)：
    <a target="_blank" href="https://github.com/YunYouJun/FantasyStar-Web">https://github.com/YunYouJun/FantasyStar-Web</a>
    <hr>

    <br>

    <div class="text-center alert alert-danger alert-dismissable role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      总之，有任何 <strong><a class="text-danger" href="{{ route('bug') }}">BUG</a></strong> 或者
      <strong><a class="text-info" href="{{ route('advice') }}">建议</a></strong> 请尽情反馈我！
      (<del><a class="text-success" href="{{ route('sponsor') }}">呸，赞助我也行~</a></del>)
    </div>

    <ul class="nav nav-tabs nav-justified">
      <li><a href="{{ route('help') }}" class="bg-primary" target="_blank">Q&A 问答区</a></li>
      <li><a href="{{ route('advice') }}" class="bg-info" target="_blank">建议留言板</a></li>
      <li><a href="{{ route('bug') }}" class="bg-danger" target="_blank">BUG反馈区</a></li>
      <li><a href="{{ route('valhalla') }}" class="bg-success" target="_blank">幻星英灵殿</a></li>
      <li><a href="{{ route('sponsor') }}" class="bg-warning" target="_blank">幻星功德簿</a></li>
    </ul>

  </div>

@stop
