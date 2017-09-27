@extends('layouts.default')
@section('title', '建议留言区')

@section('content')
  <div class="jumbotron" style="padding-bottom:0px;">
    <div class="page-header">
      <h1> <i class="fa fa-assistive-listening-systems text-primary"></i> 建议留言区 <small>Fantasy Star</small></h1>
    </div>

    <p>
      因为是业余水平加业余时间开发的东西，所以大概并没有什么<del>卵</del>用。
      自己一个人实力有限，精力有限，想法有限，现存BUG大概很多，并且许多预想功能也尚在施工中，所以现在基本是个半吊子东西。
      <br>
    </p>

    <blockquote>
        <h3 class="text-center">主要待定功能</h3>
        <ul>
            <li>文章管理模块</li>
            <li>活动管理模块</li>
            <li>资源分享</li>
            <li>成就系统</li>
        </ul>
    </blockquote>

    <p class="text-center">
      那么如果您发现有什么 <i class="fa fa-assistive-listening-systems text-primary"></i> 好的<strong>建议</strong>以及觉得有什么需要<strong>改进之处</strong>都请告诉我。<strong>Orz 在此拜谢！</strong>
      <br>
      <small>当然还是请写清具体的想法（诸如具体的改进点与改进的原因等）</small>
      <br>
      <img style="max-width:250px;" src="/assets/img/yunyoujun/Orz.png" alt="Orz">
    </p>

  </div>

  @include('plugins.changyan', ['sid' => 'advice'])

@stop
