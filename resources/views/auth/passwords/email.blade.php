@extends('layouts.default')
@section('title', '重置密码')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading m-b-md">
                    <h1 class="text-center">重置密码</h1>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group form-group-lg {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">邮箱地址：</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                    发送密码重置邮件
                                </button>
                            </div>
                        </div>

                        <hr class="m-b-md">

                        <p class="text-center">
                            若邮箱遗忘，请联系<a href="{{ route('contact') }}">管理员</a>。
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
