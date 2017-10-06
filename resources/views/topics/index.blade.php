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

        @if ( ! $topics->isEmpty())

        <div >
            <div class="panel-body">
                @if (count($topics))
                    <ul class="list-group row media-list">
                        @foreach ($topics as $topic)
                            @include('topics.partials._topic')
                        @endforeach
                    </ul>
                @else
                    <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
                @endif
            </div>

            <div class="panel-footer text-center">
                {!! $topics->render() !!}
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
