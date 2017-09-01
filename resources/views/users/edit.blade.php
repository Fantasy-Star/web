@extends('layouts.default')
@section('title', '编辑个人资料')

@section('content')
<div class="col-md-3">

</div>

<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="text-center"><i class="fa fa-cog" aria-hidden="true"></i> 个人资料 </h3>
    </div>
      <div class="panel-body">

        @include('shared._errors')

        <div class="gravatar_edit">
          <a href="http://gravatar.com/emails" target="_blank">
            <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar box-shadow"/>
          </a>
        </div>

        <form method="POST" action="{{ route('users.update', $user->id )}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="form-group">
              <label for="name">名称：</label>
              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
              <label for="email">邮箱：</label>
              <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>

            <div class="form-group">
              <label for="academy">学院：</label>
              <select class="form-control" name="academy">
                @foreach($user->getAcademyName() as $academy_id=>$academy_name)
                <option {{ $user->academy == $academy_id ? 'selected':'' }} value="{{ $academy_id }}"> {{ $academy_name }} </option>
                @endforeach
              </select>
            </div>

            <!-- <div class="form-group">
              <label for="password">密码：</label>
              <input type="password" name="password" class="form-control" value="{{ old('password') }}">
            </div>

            <div class="form-group">
              <label for="password_confirmation">确认密码：</label>
              <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
            </div> -->

            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
  </div>
</div>
@stop
