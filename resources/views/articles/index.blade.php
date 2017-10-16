@extends('layouts.default')

@section('title')
    文章 @parent
@stop

@section('content')

<div class="col-md-12">

    <div class="panel panel-default">

        <ul class="nav nav-tabs">
            <li role="presentation" class="{{ $current_category == 0  ? 'active':''}}" ><a href="{{ route('articles.index') }}">全部</a></li>
            @foreach ($categories as $category)
            <li role="presentation" class="{{ $current_category == $category->id ? 'active':'' }}" >
                <a href="{{ route('articles.index', ['category_id'=>$category->id]) }}">
                    <strong>{{ $category->name }}</strong></a>
            </li>
            @endforeach
        </ul>

        <div style="background-color: rgba(255,255,255,0.5);">
        @if ( ! $articles->isEmpty())
            <div class="panel-body">
                @include('articles.partials.articles')
            </div>

            <div class="panel-footer text-center">
                {!! $articles->render() !!}
            </div>
        @else
        <div class="panel-body" style="padding-bottom: 0px;">
            <h3 class="text-center">还没有任何文章发布哦~</h3>
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
