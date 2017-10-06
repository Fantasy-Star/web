
    <li class="list-group-item media">
        <div class="col-md-9" style="padding-left: 0px;">
            <div class="media-left text-center">
                <a class="media-object" href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}" data-toggle="tooltip" data-placement="bottom">
                    <img class="img-circle img-thumbnail" alt="{{{ $topic->user->name }}}" src="{{ $topic->user->gravatar('50') }}"/>
                </a>
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
                    <a href="{{ route('topics.show', $topic->id) }}" title="{{ $topic->title }}">
                        <strong>{{ $topic->title }}</strong>
                    </a>
                </h4>
                <hr style="margin:5px;">
                <div style="width:150px;height: 50px; overflow: hidden; text-overflow:ellipsis; white-space: nowrap;">
                    {!! $topic->body !!}
                </div>
            </div>
            <hr style="margin:5px;">
        </div>

        <div class="media-right col-md-3">
            <div class="topic-info">
                <span title="评论数">
                    &nbsp; <i class="glyphicon glyphicon-comment"></i> {{ $topic->reply_count }}
                </span>
                <br>
                <span title="点赞数">
                    &nbsp; <i class="glyphicon glyphicon-thumbs-up"></i> {{ $topic->praise_count }}
                </span>
                <br>
                <span title="查看数">
                    &nbsp; <i class="glyphicon glyphicon-eye-open"></i> {{ number_shorten($topic->view_count) }}
                </span>
                <br>
                <span title="{{ $topic->updated_at }}">
                    &nbsp; <i class="glyphicon glyphicon-time"></i> {{ $topic->updated_at }}
                </span>
            </div>
        </div>

    </li>

