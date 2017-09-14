<tr>
    <td>{{ $book->id }}</td>
    <td>《<a href="{{ route('books.show', $book->id )}}" style="color:#000;">{{ $book->name }}</a>》</td>
    <td>{{ $book->author }}</td>
    <td>{{ $book->total }}</td>
    <td>剩余{{ $book->remain_num }}本</td>
    <td>{{ $book->pubisher }}</td>
    <td>{{ $book->pub_date }}</td>
    <td>{{ $book->douban_score }}</td>
    <td><a href="{{ route('users.show', $book->user_id) }}" target="_blank">{{ $book->getKeeper()->name }}</a></td>
</tr>
