<div class="text-right">
    <span class="text-muted">
            <i class="glyphicon glyphicon-time"></i> 最后更新时间： {{ $topic->updated_at }}
    </span>
    <br>
    @can('destroy', $topic)
        <br>
        <a class="btn btn-sm btn-primary" href="{{ route('topics.edit', [$topic->id]) }}" title="编辑话题" data-toggle="tooltip">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        <form action="{{ route('topics.destroy', $topic->id) }}" method="post" class="display-inline">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger" title="删除话题" data-toggle="tooltip">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
        </form>
    @endcan
</div>
