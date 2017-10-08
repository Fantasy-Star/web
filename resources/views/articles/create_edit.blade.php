@extends('layouts.default')

@section('title')
    {{ $article->id > 0 ? '编辑文章' : '创作文章' }}@parent
@stop

@section('content')
    <script src="{{ asset('/assets/js/ckeditor/ckeditor.js') }}"></script>

        <div class="col-md-12 panel panel-default">
            <h2 class="text-center page-header"><i class="fa fa-pencil"></i> {{ $article->id > 0 ? '编辑文章' : '创作文章' }}</h2>

            <div class="panel-body">
                @include('shared._errors')
                @if ($article->id > 0)
                    <form method="POST" action="{{ route('articles.update', $article->id) }}" accept-charset="UTF-8" id="article-edit-form">
                        <input name="_method" type="hidden" value="PATCH">
                @else
                    <form method="POST" action="{{ route('articles.store') }}" accept-charset="UTF-8" id="article-create-form">
                @endif
                        {!! csrf_field() !!}
                        <input name="category_id" type="hidden" value="1">

                        <div class="form-group">
                            <input class="form-control" placeholder="{{ lang('Please write down a topic') }}" name="title" type="text" value="{{ old('title') ?: $article->title }}" required="require">
                        </div>

                        <div class="form-group display-inline">
                            <div class="btn-group" data-toggle="buttons">
                                @foreach ($categories as $category)
                                    <label class="btn btn-default"  data-toggle="tooltip" title="{{ $category->description }}">
                                        <input type="radio" name="category_id" value="{{ $category->id }}" autocomplete="off" checked>
                                        {{ $category->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        &nbsp;
                        <div class="form-group display-inline">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default active">
                                    <input type="radio" name="is_original" value="yes" autocomplete="off" checked> 原创
                                </label>
                                <label class="btn btn-default">
                                    <input type="radio" name="is_original" value="no" autocomplete="off"> 转载
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                             <textarea name="body" id="article_editor" rows="10" cols="80">
                                    {{ old('body') ?: $article->body }}
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'article_editor' );
                            </script>
                        </div>

                        @if ($article->id > 0)
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">
                                    <i class="fa fa-pencil-square-o"></i> 更新
                                </button>
                            </div>
                        @else
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">
                                    <i class="fa fa-pencil-square-o"></i> {{ lang('Publish') }}
                                </button>
                            </div>
                        @endif


                    </form>
            </div>
        </div>

@stop
