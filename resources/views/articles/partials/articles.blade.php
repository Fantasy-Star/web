@if (count($articles))

    <ul class="list-group row media-list">
        @foreach ($articles as $article)
            <li class="list-group-item media">
                <div class="col-md-9" style="padding-left: 0px;">
                    <div class="media-left text-center">
                        <a class="media-object" href="{{ route('users.show', [$article->user_id]) }}" title="{{ $article->user->name }}" data-toggle="tooltip" data-placement="bottom">
                            <img class="img-circle img-thumbnail" alt="{{{ $article->user->name }}}" src="{{ $article->user->gravatar('50') }}"/>
                        </a>
                        <a class="label label-primary" href="{{ route('users.show', [$article->user_id]) }}" title="{{ $article->user->identity }}" data-toggle="tooltip" data-placement="top">
                            {{ $article->user->name }}
                        </a>
                    </div>

                    <div class="media-body">
                        <h4 class="media-heading">
                            <span class="label label-{{ $article->is_original == 'yes' ? 'success' : 'default' }}">
                                {{ $article->is_original == 'yes' ? '原创' : '转载' }}
                            </span>
                            &nbsp;
                            <a href="{{ route('articles.show', $article->id) }}" title="{{ $article->title }}">
                                <strong>{{ $article->title }}</strong>
                            </a>
                        </h4>
                        <hr style="margin:5px;">
                        <div style="width:150px; overflow: hidden; text-overflow:ellipsis; white-space: nowrap;">
                            {{ $article->body }}
                        </div>
                    </div>
                    <hr style="margin:5px;">
                </div>

                <div class="media-right col-md-3">
                    <div class="article-info">
                        <span title="评论数">
                            &nbsp; <i class="glyphicon glyphicon-comment"></i> {{ $article->reply_count }}
                        </span>
                        <br>
                        <span title="点赞数">
                            &nbsp; <i class="glyphicon glyphicon-thumbs-up"></i> {{ $article->praise_count }}
                        </span>
                        <br>
                        <span title="查看数">
                            &nbsp; <i class="glyphicon glyphicon-eye-open"></i> {{ number_shorten($article->view_count) }}
                        </span>
                        <br>
                        <span title="{{ $article->updated_at }}">
                            &nbsp; <i class="glyphicon glyphicon-time"></i> {{ $article->updated_at }}
                        </span>
                    </div>
                </div>

            </li>
        @endforeach
    </ul>

@else
    <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
@endif
