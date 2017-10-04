@extends('layouts.default')
@section('title', '所有用户')

@section('content')
<div class="col-md-12">
  <div class="panel panel-default">
    <h1 class="panel-heading">所有注册成员</h1>
    <div class="panel-body">
      <p class="text-center">大概就这样~</p>
    </div>
  </div>
  @foreach ($users as $user)
    @include('users._user')
  @endforeach
  <div class="text-center">
    {!! $users->render() !!}
  </div>
</div>
@stop
