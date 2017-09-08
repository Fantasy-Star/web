@extends('layouts.default')
@section('title', '登录')

@section('content')
<div class="col-md-offset-3 col-md-6">
  <div class="panel panel-default  m-b-md">
    <div class="panel-heading">
      <h1 class="text-center">登录</h1>
    </div>
    <div class="panel-body">
      @include('shared._errors')

      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group form-group-lg">
          <div class="col-md-12">
            <!-- <div class="input-group"> -->
              <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> -->
              <input type="text" name="email" class="form-control" value="{{ old('email') }}" required placeholder="您的邮箱">
            <!-- </div> -->
          </div>
        </div>

        <div class="form-group form-group-lg">
          <div class="col-md-12">
            <!-- <div class="input-group"> -->
              <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
              <input type="password" name="password" class="form-control" value="{{ old('password') }}" required placeholder="您的密码">
            <!-- </div> -->
          </div>
        </div>

        <div class="form-group form-group-lg">
          <div class="col-sm-12">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember"> 记住我 <small>(非安全环境请勿勾选此项)</small>
              </label>
              <div style="display: inline-block;">
              <a href="{{ route('password.request') }}">忘记密码？</a>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-sm-6">
              <button type="submit" class="btn btn-primary btn-block btn-lg" style="margin-top: 8px;">登&nbsp;录</button>
          </div>
          <div class="col-md-6 col-sm-6">
              <a href="{{ route('signup') }}" class="btn btn-default btn-block btn-lg" style="margin-top: 8px;">注&nbsp;册</a>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@stop
