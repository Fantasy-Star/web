<div class="text-center">
    @if(Auth::check() && Auth::user()->verified)
        @if(Auth::user()->isOrdering($book->id))
            <form action="{{ route('borrow.destroy', $book->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">取消预约</button>
            </form>
        @else
            <form action="{{ route('borrow.store', $book->id) }}" method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">预约</button>
            </form>
        @endif
    @else
        <button class="btn btn-primary disabled"  data-toggle="tooltip" title="只有认证社员方可预约借书！">预约</button>
    @endif
</div>
