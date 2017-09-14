@extends('layouts.default')
@section('title', $book->name)
@section('content')
<div class="row">
  <div class="col-md-offset-1 col-md-10 panel panel-default">
      @include('books._book_info', ['book' => $book])
  </div>
</div>
@stop
