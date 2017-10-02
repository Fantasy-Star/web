@if (Auth::check())
    @if ($user->id !== Auth::user()->id)
        <div>
            @if (Auth::user()->isFollowing($user->id))
                <form action="{{ route('followers.destroy', $user->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-default btn-block">
                        <i class="fa fa-minus"></i> 取消关注
                    </button>
                </form>
            @else
                <form action="{{ route('followers.store', $user->id) }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-block btn-primary">
                        <i class="fa fa-plus"></i> 关注
                    </button>
                </form>
            @endif
        </div>
    @endif
@endif