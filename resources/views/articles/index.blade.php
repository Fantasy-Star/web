@extends('layouts.default')

@section('title')
    文章 @parent
@stop

@section('content')

<div class="col-md-12">

    <div class="panel panel-default">
        <div class="panel-heading">
            <ul class="list-inline">

            </ul>

            <div class="clearfix"></div>
        </div>

        @if ( ! $articles->isEmpty())

        <div >
            <div class="panel-body">
                @include('articles.partials.articles')
            </div>

            <div class="panel-footer text-center">
                {!! $articles->render() !!}
            </div>
        </div>

        @else
        <div class="panel-body">
            <h3 class="text-center">还没有任何文章发布哦~</h3>
        </div>
        @endif

    </div>
</div>

@stop
