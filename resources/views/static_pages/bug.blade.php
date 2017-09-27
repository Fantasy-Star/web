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

  @include('plugins.changyan', ['sid' => 'bug'])

@stop
