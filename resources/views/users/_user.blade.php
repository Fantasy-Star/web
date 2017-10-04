<div class="col-md-3">
    <div class="panel panel-default text-center">
        <section class="user_info">
            @include('shared._user_info')
        </section>
        <div>
        @can('edit', $user)
            <a class="btn btn-sm btn-primary" title="编辑" href="{{ route('users.edit', $user->id) }}" class="display-inline">
                <i class="glyphicon glyphicon-edit"></i>
            </a>
        @endcan
        @can('destroy', $user)
            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="display-inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-sm btn-danger" title="删除"><i class="glyphicon glyphicon-trash"></i></button>
            </form>
        @endcan
        </div>
    </div>
</div>


