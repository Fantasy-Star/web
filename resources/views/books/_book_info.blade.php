<div class="panel-heading">
    <h3 class="text-center">
        《 {{ $book->name }} 》
    </h3>
</div>
<div class="panel-body">
    <h4 class="text-center">
        <span class="label label-default"><i class="fa fa-list-ol"></i> BID : {{ $book->id }}</span>
        <a href="{{ route('users.show', $book->user_id) }}" target="_blank">
            <label class="label label-info" data-toggle="tooltip" data-placement="top" title="当前保管者">
                <i class="fa fa-user"></i> {{ $book->Keeper->name }}
            </label>
        </a>
    </h4>
    <div class="form-horizontal">
        <div class="gravatar_edit">
            <img src="{{ $book->book_pic }}" alt="《{{ $book->name }}》还没有封面……" class="img-thumbnail box-shadow mt-20"/>
        </div>
        <div class="form-group text-center">
            <div class="col-sm-6 col-md-3">
                <h4>
                    <label class="label label-success" data-toggle="tooltip" data-placement="top" title="书本价格"><i class="fa fa-money"></i>
                        {{ $book->price }} <i class="glyphicon glyphicon-yen"></i>
                    </label>
                </h4>
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>
                    <label class="label label-primary">总数 ：{{ $book->total }} <i class="fa fa-book"></i></label>
                </h4>
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>
                    <label class="label label-danger">剩余 ：{{ $book->remain_num }} <i class="fa fa-book"></i></label>
                </h4>
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>
                    <a href="https://book.douban.com/subject_search?search_text={{ $book->name }}" target="_blank">
                    <label class="label label-warning"><i class="fa fa-star"></i> 豆瓣评分 ：{{ $book->douban_score }}</label>
                    </a>
                </h4>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><i class="fa fa-info-o"></i> ISBN</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="{{ $book->isbn }}" disabled="">
            </div>
            <div class="col-sm-2 help-block">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><i class="fa fa-user-o"></i> 作者</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="{{ $book->author }}" disabled="">
            </div>
            <div class="col-sm-2 help-block">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><i class="fa fa-building"></i> 出版社</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="{{ $book->publisher }}" disabled="">
            </div>
            <div class="col-sm-2 help-block">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><i class="fa fa-calendar"></i> 出版日期</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" value="{{ $book->pub_date }}" disabled="">
            </div>
            <div class="col-sm-2 help-block">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><i class="fa fa-sticky-note"></i> 备注</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="3" name="introduction" cols="50" disabled="">{{ $book->note}}</textarea>
            </div>
            <div class="col-sm-2 help-block">
                一般记载藏书由来
            </div>
        </div>

        @include('books._borrow_form')

        <h3 class="text-center">内容简介</h3>
        <div class="well well-lg">{{ $book->description }}</div>
    </div>
</div>