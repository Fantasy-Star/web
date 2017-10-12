<div class="panel panel-default padding-md">

    <div class="panel-body text-center">

        <div>
            @if(count($praisedUsers))
                <p>
                    @foreach($praisedUsers as $praisedUser)
                        <a href="{{ route('users.show', $praisedUser->id) }}" title="{{ $praisedUser->name }}" data-toggle="tooltip">
                            <img class="img-thumbnail img-circle" src="{{ $praisedUser->gravatar('30') }}">
                        </a>
                    @endforeach
                </p>
            @else
                <h5>
                    成为第一个点赞的人吧~
                </h5>
            @endif
        </div>

        <div class="btn-group">
            <?php
            $is_praised = Auth::user() && $article->praises()->ByWhom(Auth::id())->WithType('praise')->exists();
            ?>
            @if ($is_praised)
                <a href="{{ route('articles.unpraise', $article->id) }}" title="点赞"
                   class="btn btn-{{  $is_praised ? 'success' :'default' }}" >
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    已赞过
                </a>
            @else
            <a href="{{ route('articles.praise', $article->id) }}" title="点赞"
               <?php
               $is_praised = Auth::user() && $article->praises()->ByWhom(Auth::id())->WithType('praise')->exists();
               ?>
               class="btn btn-{{  $is_praised ? 'success' :'default' }}" >
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    点赞
            </a>
            @endif

        </div>

    </div>
</div>