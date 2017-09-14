<tr>
    <td>{{ $book->id }}</td>
    <td>《<a href="{{ route('books.show', $book->id )}}" style="color:#000;">{{ $book->name }}</a>》</td>
    <td>{{ $book->author }}</td>
    <td><span class="badge">{{ $book->total }}</span></td>
    <td><span class="badge">{{ $book->remain_num }}</span></td>
    <td>{{ $book->pubisher }}</td>
    <td>{{ $book->pub_date }}</td>
    <td>{{ $book->display_score($book->douban_score) }}</td>
    <td><a href="{{ route('users.show', $book->user_id) }}" target="_blank">{{ $book->Keeper['name'] }}</a></td>
</tr>
