<li>
    <img src="{{ $user->gravatar('30') }}" alt="{{ $user->name }}" class="img-circle img-thumbnail"/>
    <a href="{{ route('users.show', $user->id )}}" class="username">{{ $user->name }}</a>

    @can('destroy', $user)
      <form action="{{ route('users.destroy', $user->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger delete-btn" title="删除该用户"><i class="fa fa-trash"></i></button>
      </form>
    @endcan
</li>
