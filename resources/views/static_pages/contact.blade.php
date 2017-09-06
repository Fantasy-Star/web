@extends('layouts.default')
@section('title', '联系我')

@section('content')
  <div class="jumbotron">
    <div class="page-header">
      <h1> <i class="glyphicon glyphicon-link"></i> 联系我 <small>YunYouJun</small></h1>
    </div>

          <div class="text-center">
          <div class="gravatar_edit">
              <a href="{{ route('users.show', $YunYouJun->id )}}" target="_blank">
                  <img src="{{ $YunYouJun->gravatar('200') }}" alt="{{ $YunYouJun->name }}" class="gravatar box-shadow"/>
              </a>
          </div>
          <h5 class="text-center">
              {{ $YunYouJun->name }}
          </h5>
          <h4 class="text-center">
                  <span class="label label-{{ $YunYouJun->verified == 0 ? 'default' : 'success' }}">
                      {{ $YunYouJun->verified == 0 ? '未认证' : '已认证 - '.$YunYouJun->identity }}
                  </span>
          </h4>
      <ul class="list-inline">
          <li data-toggle="tooltip" data-placement="bottom" title="{{ $YunYouJun->email }}">
              <a href="mailto:{{ $YunYouJun->email }}">
                  <i class="fa fa-envelope"></i>
              </a>
          </li>

          <li data-toggle="tooltip" data-placement="bottom" title="{{ $YunYouJun->weibo_name }}">
              <a href="{{ $YunYouJun->weibo_link }}" target="_blank">
                  <i class="fa fa-weibo"></i>
              </a>
          </li>

          <li data-toggle="tooltip" data-placement="bottom" title="{{ $YunYouJun->personal_website }}">
              <a href="{{ $YunYouJun->personal_website }}" rel="nofollow" target="_blank" class="url">
                  <i class="fa fa-globe"></i>
              </a>
          </li>

          <li data-toggle="tooltip" data-placement="bottom" title="GitHub:YunYouJun">
              <a href="https://github.com/YunYouJun" target="_blank">
                <i class="fa fa-github"></i>
              </a>
          </li>

          <li data-toggle="tooltip" data-placement="bottom" title="{{ $YunYouJun->qq }}">
              <i class="fa fa-qq"></i>
          </li>

          <li data-toggle="tooltip" data-placement="bottom" title="{{ $YunYouJun->wechat }}">
              <i class="fa fa-wechat"></i>
          </li>

          <li data-toggle="tooltip" data-placement="bottom" title="{{ $YunYouJun->city }}">
              <i class="fa fa-map-marker"></i>
          </li>

      </ul>
      </div>

      <blockquote class="text-center">
          {{ $YunYouJun->introduction }}
      </blockquote>

      <p class="text-center">
          =。= 貌似没什么好自我介绍的……
          <br>
          如果想加入一起开发/管理（<del>接锅</del>）的话，可以联♂系我。
      </p>

  </div>

@stop
