@extends('layouts.default')
@section('title', '社团藏书')

@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <h1><i class="fa fa-book"></i> 藏书 </h1>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">序号</th>
                            <th class="text-center">书名</th>
                            <th class="text-center">作者</th>
                            <th class="text-center">总数/本</th>
                            <th class="text-center">在库/本</th>
                            <th class="text-center">出版社</th>
                            <th class="text-center">出版日期</th>
                            <th class="text-center">豆瓣评分</th>
                            <th class="text-center">保管者</th>
                        </tr>
                    </thead>
                    <tbody
                    @foreach ($books as $book)
                        @include('books._book')
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {!! $books->render() !!}
            </div>
        </div>
    </div>
@stop
