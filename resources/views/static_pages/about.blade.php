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
      <ul class="nav nav-tabs nav-justified">
        <li><a href="" class="bg-info">建议留言板</a></li>
        <li><a href="" class="bg-danger">BUG反馈区</a></li>
        <li><a href="{{ route('valhalla') }}" class="bg-success">幻星英灵殿</a></li>
        <li><a href="" class="bg-warning">幻星功德簿</a></li>
      </ul>
    </p>

    <div class="text-center alert alert-danger alert-dismissable" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      总之，有 <strong>BUG</strong> 或者任何 <strong>建议</strong> 请尽情反馈我！(<del>呸，赞助我也行~</del>)
    </div>

  </div>

@stop
