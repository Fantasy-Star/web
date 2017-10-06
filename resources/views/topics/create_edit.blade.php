@extends('layouts.default')

@section('title')
    {{ $topic->id > 0 ? '编辑话题' : '发布话题' }}@parent
@stop

@section('content')
    <script src="{{ asset('/assets/js/ckeditor/ckeditor.js') }}"></script>

    <div class="col-md-12 panel panel-default">
        <h2 class="text-center page-header"><i class="fa fa-pencil"></i> {{ $topic->id > 0 ? '编辑话题' : '发布话题' }}</h2>

        <div class="panel-body">
            @include('shared._errors')
            @if ($topic->id > 0)
                <form method="POST" action="{{ route('topics.update', $topic->id) }}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="PATCH">
            @else
                <form method="POST" action="{{ route('topics.store') }}" accept-charset="UTF-8">
            @endif
                    {!! csrf_field() !!}
                    <input name="category_id" type="hidden" value="1">

                            <div class="form-group">
                                <input class="form-control" placeholder="{{ lang('Please write down a topic') }}" name="title" type="text" value="{{ old('title') ?: $topic->title }}" required="require">
                            </div>

                            <div class="form-group">
                                <div class="btn-group" data-toggle="buttons">
                                    @foreach ($categories as $category)
                                        @can('publish',$category)
                                        <label class="btn btn-primary {{ $category->id == config('fantasystar.simple_category_id') ? 'active':'' }}" data-toggle="tooltip" title="{{ $category->description }}">
                                            <input type="radio" name="category_id" value="{{ $category->id }}" autocomplete="off" checked>
                                            {{ $category->name }}
                                        </label>
                                        @endcan
                                    @endforeach
                                </div>

                            </div>

                            <div class="form-group">
                             <textarea name="body" id="topic_editor" rows="10" cols="80">
                                    {{ old('body') ?: $topic->body }}
                            </textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'topic_editor' );
                                </script>
                            </div>

                            @if ($topic->id > 0)
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
