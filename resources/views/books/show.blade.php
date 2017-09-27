@extends('layouts.default')
@section('title', $book->name)
@section('content')
<div class="row">
  <div class="col-md-12 panel panel-default">
      @include('books._book_info', ['book' => $book])
  </div>
</div>

  @include('plugins.changyan', ['sid' => 'book_comment_'.$book->id])

@stop
