@extends('layouts.default')
@section('title', $title)

@section('content')
<div class="col-md-12">
  <h1 class="page-header">{{ $title }}</h1>
    @foreach ($users as $user)
        @include('users._user')
    @endforeach
  <div class="text-center">
    {!! $users->render() !!}
  </div>
</div>
@stop
