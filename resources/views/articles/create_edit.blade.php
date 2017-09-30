@extends('layouts.default')

@section('title')
    {{ $article->id > 0 ? '编辑文章' : '创作文章' }}@parent
@stop

@section('content')

        <div class="col-md-12 panel panel-default">
            <h2 class="text-center page-header"><i class="fa fa-pencil"></i> {{ $article->id > 0 ? '编辑文章' : '创作文章' }}</h2>

            <div class="panel-body">
                @if ($article->id > 0)
                    <form method="POST" action="{{ route('topics.update', $article->id) }}" accept-charset="UTF-8" id="article-edit-form">
                        <input name="_method" type="hidden" value="PATCH">
                @else
                    <form method="POST" action="{{ route('articles.store') }}" accept-charset="UTF-8" id="article-create-form">
                @endif
                        {!! csrf_field() !!}
                        <input name="category_id" type="hidden" value="">
                        <div class="form-group">
                            <input class="form-control" id="article-title" placeholder="{{ lang('Please write down a topic') }}" name="title" type="text" value="{{ old('title') ?: $article->title }}" required="require">
                        </div>

                        <div class="form-group">
                            <textarea required="require" class="form-control" rows="20" style="overflow:hidden" id="reply_content" placeholder="{{ lang('Please using markdown.') }}" name="body" cols="50">{{ old('body') ?: $article->body_original }}</textarea>
                        </div>
                    </form>
            </div>
        </div>

@stop
