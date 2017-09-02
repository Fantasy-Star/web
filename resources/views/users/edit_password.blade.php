@extends('layouts.default')

@section('title')
    修改密码 | @parent
@stop

@section('content')

    <div class="col-md-3 main-col">
        @include('users.nav.edit_info')
    </div>

    <div class="col-md-9">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="text-center"><i class="fa fa-lock" aria-hidden="true"></i> 修改密码</h2>
            </div>
            <div class="panel-body ">
                @include('shared._errors')

                <form class="form-horizontal" method="POST" action="{{ route('users.update_password', $user->id) }}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="PATCH">
                    {!! csrf_field() !!}

                    <div class="form-group form-group-lg">
                        <label class="col-md-2 control-label">邮 箱：</label>
                        <div class="col-md-6">
                            <input name="" class="form-control" type="text" value="{{ $user->email }}" disabled>
                            <input name="email" type="hidden" value="{{ $user->email }}">
                        </div>
                        <div class="col-sm-4 help-block">您的登录账户</div>
                    </div>

                    <div class="form-group form-group-lg">
                        <label class="col-md-2 control-label">密 码：</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-sm-4 help-block">密码不少于六位数</div>
                    </div>

                    <div class="form-group form-group-lg">
                        <label class="col-md-2 control-label">确认密码：</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <input class="btn btn-primary btn-block btn-lg" id="user-edit-submit" type="submit" value="修改密码">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

@stop
