@if (count($articles))

    <ul class="list-group row media-list">
        @foreach ($articles as $article)
            <li class="list-group-item media">
                <div class="col-md-9" style="padding-left: 0px;">
                    <div class="media-left text-center hidden-xs">
                        <a class="media-object" href="{{ route('users.show', [$article->user_id]) }}" title="{{ $article->user->name }}" data-toggle="tooltip" data-placement="bottom">
                            <img class="img-circle img-thumbnail" alt="{{{ $article->user->name }}}" src="{{ $article->user->gravatar('50') }}"/>
                        </a>
                        <a class="label label-primary" href="{{ route('users.show', [$article->user_id]) }}" title="{{ $article->user->identity }}" data-toggle="tooltip" data-placement="top">
                            {{ $article->user->name }}
                        </a>
                    </div>

                    <div class="media-body">
                        <h4 class="media-heading">
                            <span class="label label-primary }}">
                                {{ $article->category->name }}
                            </span>
                            &nbsp;
                            <span class="label label-{{ $article->is_original == 'yes' ? 'success' : 'default' }}">
                                {{ $article->is_original == 'yes' ? '原创' : '转载' }}
                            </span>
                            &nbsp;
                            <a class="label label-info" href="{{ route('articles.show', $article->id) }}" title="{{ $article->title }}">
                                <strong>{{ $article->title }}</strong>
                            </a>
                        </h4>
                        <hr style="margin:5px;">
                        <div class="well" style="margin-bottom: 10px;">
                            {{ sub_str(strip_tags($article->body),100) }}
                        </div>
                    </div>
                    <hr style="margin:5px;">
                </div>

                <div class="media-right col-md-3">
                    <div class="article-info">
                        <span title="作者" class="text-primary">
                            &nbsp; <i class="glyphicon glyphicon-user"></i> / {{ $article->user->name }}
                        </span>
                        <br>
                        <!-- <span title="评论数" class="text-muted">
                            &nbsp; <i class="glyphicon glyphicon-comment"></i> /
                            {{--{{ $article->reply_count }}--}}
                            @include('plugins.changyan_count', ['sourceId' => 'article_' . $article->id])
                        </span>
                        <br> -->
                        <span title="点赞数" class="text-success">
                            &nbsp; <i class="glyphicon glyphicon-thumbs-up"></i> / {{ $article->praise_count }}
                        </span>
                        <br>
                        <span title="查看数" class="text-warning">
                            &nbsp; <i class="glyphicon glyphicon-eye-open"></i> / {{ number_shorten($article->view_count) }}
                        </span>
                        <br>
                        <span title="最后动态：{{ $article->updated_at }}" class="text-danger">
                            &nbsp; <i class="glyphicon glyphicon-time"></i> / {{ $article->updated_at }}
                        </span>
                    </div>
                </div>

            </li>
        @endforeach
    </ul>

@else
    <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
@endif
