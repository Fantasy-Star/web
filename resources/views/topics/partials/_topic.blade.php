
    <li class="list-group-item media">
        <div class="col-md-9" style="padding-left: 0px;">
            <div class="media-left text-center hidden-xs">
                <a class="media-object" href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}" data-toggle="tooltip" data-placement="bottom">
                    <img class="img-circle img-thumbnail" alt="{{{ $topic->user->name }}}" src="{{ $topic->user->gravatar('50') }}"/>
                </a>
                <hr>
                <a class="label label-primary" href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->identity }}" data-toggle="tooltip" data-placement="top">
                    {{ $topic->user->name }}
                </a>
            </div>

            <div class="media-body">
                <h4 class="media-heading">
                    <span class="label label-success">
                        {{ $topic->category->name }}
                    </span>
                    &nbsp;
                    <a class="label label-info" href="{{ route('topics.show', $topic->id) }}" title="{{ $topic->title }}">
                        <strong>{{ $topic->title }}</strong>
                    </a>
                </h4>
                <hr style="margin: 5px;">
                {{--<div style="width:150px;height: 50px; overflow: hidden; text-overflow:ellipsis; white-space: nowrap;">--}}
                <div class="well" style="margin-bottom: 10px;">
                    {{ sub_str(strip_tags($topic->body),100) }}
                </div>
                {{--</div>--}}
            </div>
        </div>

        <div class="media-right col-md-3">
            <div class="topic-info">
                <span title="发起者" class="text-muted">
                    &nbsp; <i class="glyphicon glyphicon-user"></i> / {{ $topic->user->name }}
                </span>
                <br>
                <span title="评论数" class="text-muted">
                    &nbsp; <i class="glyphicon glyphicon-comment"></i> /
                    {{--{{ $topic->reply_count }}--}}
                    @include('plugins.changyan_count', ['sourceId' => 'topic_' . $topic->id])
                </span>
                <br>
                <span title="点赞数" class="text-muted">
                    &nbsp; <i class="glyphicon glyphicon-thumbs-up"></i> / {{ $topic->praise_count }}
                </span>
                <br>
                <span title="查看数" class="text-muted">
                    &nbsp; <i class="glyphicon glyphicon-eye-open"></i> / {{ number_shorten($topic->view_count) }}
                </span>
                <br>
                <span title="{{ $topic->updated_at }}" class="text-muted">
                    &nbsp; <i class="glyphicon glyphicon-time"></i> / {{ $topic->updated_at }}
                </span>
            </div>
        </div>

    </li>

