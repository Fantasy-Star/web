@extends('layouts.default')
@section('title', '所有用户')

@section('content')
<div class="col-md-12">
  <div class="element-panel">
    <h1>所有用户</h1>
    <ul class="users">
      @foreach ($users as $user)
        @include('users._user')
      @endforeach
    </ul>

    <div class="text-center">
      {!! $users->render() !!}
    </div>
  </div>
</div>
@stop
