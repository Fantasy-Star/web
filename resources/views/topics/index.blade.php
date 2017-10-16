@extends('layouts.default')

@section('title')
    文章 @parent
@stop

@section('content')

<div class="col-md-12" >

    <div class="panel panel-default">
        <ul class="nav nav-tabs">
            <li role="presentation" class="{{ $current_category == 0  ? 'active':''}}" ><a href="{{ route('topics.index') }}">全部</a></li>
            @foreach ($categories as $category)
                <li role="presentation" class="{{ $current_category == $category->id ? 'active':'' }}" ><a href="{{ route('topics.index', ['category_id'=>$category->id]) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>

        <div style="background-color: rgba(255,255,255,0.7);">
        @if ( ! $topics->isEmpty())
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
        @else
        <div class="panel-body" style="padding-bottom: 0px;">
            <h3 class="text-center">还没有任何话题发布哦~
                <small class="text-muted">大概是被外星人禁言了=。=</small>
            </h3>
            <br>
            <hr>
            <div class="text-center m-t-30">
                <img style="max-width:250px;" src="{{ asset('/assets/img/yunyoujun/daze.png') }}" alt="一脸智障.png">
            </div>
        </div>
        @endif
        </div>


    </div>
</div>

@stop
