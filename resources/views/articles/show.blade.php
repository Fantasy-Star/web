@extends('layouts.default')

@section('title')
    {{ $article->title }} @parent
@stop

@section('content')

    <div class="col-md-9">

        <div class="panel panel-default">
            <span class="label label-{{ $article->is_original == 'yes' ? 'success' : 'default' }}">
               {{ $article->is_original == 'yes' ? '原创' : '转载' }}
            </span>
            <h2 class="panel-heading text-center">
                {{ $article->title }}
            </h2>
            <div class="text-center">
                    <span class="label label-primary" data-toggle="tooltip" title="浏览数">
                        <i class="glyphicon glyphicon-eye-open"></i> {{ $article->view_count }}
                    </span>
                &nbsp;
                <span class="label label-success" data-toggle="tooltip" title="点赞数">
                        <i class="glyphicon glyphicon-thumbs-up"></i> {{ $article->praise_count }}
                    </span>
                &nbsp;
                <span class="label label-info" data-toggle="tooltip" title="评论数">
                        <i class="glyphicon glyphicon-comment"></i> {{ $article->reply_count }}
                    </span>
                &nbsp;
                <span class="label label-default" data-toggle="tooltip" title="发布时间">
                        <i class="glyphicon glyphicon-time"></i> {{ $article->created_at }}
                </span>
            </div>
            <div class="panel-body">
                <hr>
                <div style="padding: 20px;">
                    {!! $article->body !!}
                </div>
                <hr>
                @include('articles.partials._operate')
            </div>

        </div>

        @include('plugins.changyan', ['sid' => 'article_'.$article->id])

    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <section class="user_info">
                    @include('shared._user_info', ['user' => $user])
                </section>
                <section class="stats">
                    @include('shared._stats', ['user' => $user])
                </section>
            </div>
            <div class="panel-body text-center">
                @include('users.partials._follow')
                @include('users.partials._about')
            </div>
        </div>
    </div>

@stop