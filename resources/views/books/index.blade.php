@extends('layouts.default')
@section('title', '社团藏书')

@section('content')
    <div class="col-md-12">
        <div class="element-panel">
            <h1>所有藏书</h1>
            <ul class="users">
                @foreach ($books as $book)
                    @include('books._book')
                @endforeach
            </ul>

            <div class="text-center">
                {!! $books->render() !!}
            </div>
        </div>
    </div>
@stop
