@extends('layouts.default')
@section('title', $book->name)
@section('content')
<div class="row">
  <div class="col-md-offset-1 col-md-10 element-panel">
    <div class="col-md-12">
      <div class="col-md-offset-2 col-md-8">
        <section class="user_info">
          {{--@include('shared._user_info', ['book' => $book])--}}
        </section>
        <section class="stats">
          {{--@include('shared._stats', ['book' => $book])--}}
        </section>
      </div>
    </div>
    <div class="col-md-12">
      @if (Auth::check())
        {{--@include('users._follow_form')--}}
      @endif
    </div>
  </div>
</div>
@stop
