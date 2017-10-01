@extends('layouts.default')

@section('title')
    {{ $article->title }} | @parent
@stop

@section('content')

    <div class="col-md-9">

        <div class="panel article-body content-body">

            <div class="panel-body">

                <h1 class="text-center">
                    {{ $article->title }}
                </h1>

                <div class="article-meta text-center">
                    <i class="glyphicon glyphicon-time"></i> {{ $article->created_at }}
                    ·
                    <i class="glyphicon glyphicon-eye"></i> {{ $article->view_count }}
                    ·
                    <i class="glyphicon glyphicon-thumbs-up"></i> {{ $article->praise_count }}
                    ·
                    <i class="glyphicon glyphicon-comment"></i> {{ $article->reply_count }}
                </div>

                <div class="entry-content">
                    {!! $article->body !!}
                </div>

{{--                @include('topics.partials.topic_operate', ['is_article' => true, 'manage_topics' => $currentUser ? ($currentUser->can("manage_topics") && $currentUser->roles->count() <= 5) : false])--}}
            </div>

        </div>

    </div>

    <div class="col-md-3">
        <div class="panel panel-default corner-radius">
            <section class="user_info">
                @include('shared._user_info', ['user' => Auth::user()])
            </section>
            <div class="panel-heading text-center">
                {{--<h3 class="panel-title">作者：{{ $article->user->name }}</h3>--}}
            </div>

            <div class="panel-body text-center">

            </div>
        </div>
    </div>

@stop