@extends('layouts.default')

@section('title')
    {{ isset($topic) ? '编辑链接' : '分享链接' }}@parent
@stop

@section('content')
    <script src="{{ asset('/assets/js/ckeditor/ckeditor.js') }}"></script>

    <div class="col-md-8 ">
    <div class="panel panel-default">
        <h2 class="text-center page-header"><i class="fa fa-link"></i> {{ isset($topic) ? '编辑链接' : '分享链接' }}</h2>

        <div class="panel-body">
            @include('shared._errors')
            @if (isset($topic))
                <form method="POST" action="{{ route('topics.update', $topic->id) }}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="PATCH">
            @else
                <form method="POST" action="{{ route('topics.store') }}" accept-charset="UTF-8">
            @endif
                            {!! csrf_field() !!}
                            <input name="category_id" type="hidden" value="{{ config('fantasystar.share_category_id') }}">

                            <div class="form-group">
                                <input class="form-control" placeholder="{{ lang('Please write down a topic') }}" name="title" type="text" value="{{ !isset($topic) ? old('title'): $topic->title }}" required="require">
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="分享的链接" name="link" type="text" value="{{ !isset($topic) ? old('link') : $topic->share_link->link }}" required="require">
                            </div>

                            <div class="form-group">
                                <textarea id="share_links_editor" class="form-control" rows="20" style="overflow:hidden" name="body" >
                                    {{ !isset($topic) ? old('body'): $topic->body }}
                                </textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'share_links_editor' );
                                </script>
                            </div>

                            @if (isset($topic))
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">
                                        <i class="fa fa-paper-plane"></i> 更新链接
                                    </button>
                                </div>
                            @else
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">
                                        <i class="fa fa-paper-plane"></i> 分享链接
                                    </button>
                                </div>
                            @endif


                        </form>
        </div>
    </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3 class="panel-title"> 分享美好 </h3>
            </div>
            <div class="panel-body">
                <ul class="list">
                    <li>请传播美好的事物，拒绝低俗、色情等</li>
                    <li>请保持文明友善~</li>
            </div>
        </div>
    </div>

@stop
