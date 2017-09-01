@extends('layouts.default')
@section('title', '注册')

@section('content')
<div class="col-md-offset-3 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="text-center">注册</h1>
    </div>
    <div class="panel-body">
      @include('shared._errors')

      <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <div class="col-md-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-sort-by-order"></i></span>
                <input type="text" name="stu_id" class="form-control" value="{{ old('stu_id') }}" placeholder="您的学号" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-sunglasses"></i></span>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="您的昵称" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="您的邮箱" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="您的密码" required="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" placeholder="确认密码" required="">
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block btn-lg">注册</button>
      </form>
    </div>
  </div>
</div>
@stop
