<li>
    <a href="{{ route('books.show', $book->id )}}" class="username">{{ $book->name }}</a>

    @can('destroy', $book)
      <form action="{{ route('books.destroy', $book->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
      </form>
    @endcan
</li>
