@extends('layouts.default')
@section('title', '编辑个人资料')

@section('content')
    <div class="col-md-3">
        @include('users.nav.edit_info')
    </div>

    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="text-center">
              <span class="label label-info">UID : {{ $user->id }}</span>
          </h3>
        </div>
          <div class="panel-body">

            @include('shared._errors')

            <div class="gravatar_edit">
              <a href="http://cn.gravatar.com/" target="_blank">
                <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar box-shadow"/>
              </a>
            </div>

              <h4 class="text-center">
                  <span class="label label-{{ $user->verified == 0 ? 'default' : 'success' }}">
                      {{ $user->verified == 0 ? '未认证' : '已认证 - '.$user->identity }}
                  </span>
              </h4>

            <form class="form-horizontal" method="POST" action="{{ route('users.update', $user->id )}}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">性别</label>
                    <div class="col-sm-6">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="unselected" {{ $user->gender == 'unselected' ? 'checked' : '' }}> 保密
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}> ♂ 男
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}> ♀ 女
                        </label>
                    </div>
                    <div class="col-sm-4 help-block"></div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">昵称</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="name" type="text" value="{{ $user->name }}">
                    </div>

                    <div class="col-sm-4 help-block">
                        请勿频繁更改
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">学号</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="stu_id" type="text" value="{{ $user->stu_id }}" disabled>
                    </div>

                    <div class="col-sm-4 help-block">
                        如欲更改，请联系管理员
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">邮箱</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="email" type="text" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="col-sm-4 help-block">登录账户，不可更改</div>
                </div>

                <div class="form-group">
                    <label for="academy" class="col-sm-2 control-label">学院</label>
                    <div class="col-sm-6">
                        <select class="col-sm-6 form-control" name="academy">
                            @foreach($user->getAcademyName() as $academy_id=>$academy_name)
                                <option {{ $user->academy == $academy_id ? 'selected':'' }} value="{{ $academy_id }}"> {{ $academy_name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4 help-block"></div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">专业</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="major" type="text" value="{{ $user->major }}">
                    </div>
                    <div class="col-sm-4 help-block">
                        专业全称
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">班级</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="class" type="text" value="{{ $user->class }}">
                    </div>
                    <div class="col-sm-4 help-block"></div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">所属部门</label>
                    <div class="col-sm-6">
                        <select class="col-sm-6 form-control" name="department">
                            @foreach($user->getDepartmentName() as $department_id=>$department_name)
                                <option {{ $user->department == $department_id ? 'selected':'' }} value="{{ $department_id }}"> {{ $department_name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4 help-block">决定后，请勿频繁修改</div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">真实姓名</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="real_name" type="text" value="{{ $user->real_name }}">
                    </div>
                    <div class="col-sm-4 help-block">
                        请填写真实姓名
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">联系方式</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="tel" type="text" value="{{ $user->tel }}">
                    </div>
                    <div class="col-sm-4 help-block">
                        手机号码
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label"><i class="fa fa-birthday-cake"></i> 生日</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="birthday" type="date" value="{{ $user->birthday }}">
                    </div>
                    <div class="col-sm-4 help-block">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">家乡城市</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="city" type="text" value="{{ $user->city }}">
                    </div>
                    <div class="col-sm-4 help-block">
                        例如：江苏省南京市
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">微博名称</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="weibo_name" type="text" value="{{ $user->weibo_name }}">
                    </div>
                    <div class="col-sm-4 help-block"></div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">微博链接</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="weibo_link" type="text" value="{{ $user->weibo_link}}">
                    </div>
                    <div class="col-sm-4 help-block">请添加前缀 http://</div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">QQ号</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="qq" type="text" value="{{ $user->qq }}">
                    </div>
                    <div class="col-sm-4 help-block"></div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">微信号</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="wechat" type="text" value="{{ $user->wechat }}">
                    </div>
                    <div class="col-sm-4 help-block"></div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">个人网站</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="personal_website" type="text" value="{{ $user->personal_website }}">
                    </div>
                    <div class="col-sm-4 help-block">
                        请添加合适的前缀 http:// 或 https://
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">个人简介</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="3" name="introduction" cols="50">{{ $user->introduction }}</textarea>
                    </div>
                    <div class="col-sm-4 help-block">
                        请一句话介绍你自己，大部分情况下会在你的头像和名字旁边显示。
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" class="btn btn-primary btn-block">更新</button>
                    </div>
                </div>

            </form>
        </div>
      </div>
    </div>
@stop
