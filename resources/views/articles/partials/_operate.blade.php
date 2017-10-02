<div class="text-right">
    <span class="text-muted">
            <i class="glyphicon glyphicon-time"></i> 最后更新时间： {{ $article->updated_at }}
    </span>
    <br>
    @can('destroy', $article)
        <br>
        <a class="btn btn-sm btn-primary" href="{{ route('articles.edit', [$article->id]) }}" title="编辑文章" data-toggle="tooltip">
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        </form>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger" title="删除文章" data-toggle="tooltip">
                <i class="glyphicon glyphicon-trash"></i>
            </button>
        </form>
    @endcan
</div>
