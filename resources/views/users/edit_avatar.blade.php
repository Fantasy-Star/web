@extends('layouts.default')

@section('title')
    {{ lang('Photo Upload') }} | @parent
@stop

@section('content')
    <div class="col-md-3">
        @include('users.nav.edit_info')
    </div>

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center"><i class="fa fa-picture-o" aria-hidden="true"></i> 修改头像 </h3>
            </div>
            <div class="panel-body text-center">
                <div class="gravatar_edit">
                    <a href="http://cn.gravatar.com/" target="_blank">
                        <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar box-shadow"/>
                    </a>
                </div>
                <h4>{{ $user->email }}</h4>
                <hr>

                <h2><small>头像采用</small> <a href="http://cn.gravatar.com/" target="_blank">Gravatar</a> <small>服务</small></h2>
                <p>
                    以便节约服务器资源，以及方便使用<small>（<del>才不是我懒得写这方面功能呢！</del>）</small>
                </p>

                <br>
                <h3><a href="https://baike.baidu.com/item/Gravatar" target="_blank">什么是Gravatar?（百度百科）</a></h3>
                <br>

                <h3>使用方法</h3>
                <ul>
                    <li>使用你在本网站的注册邮箱，至<a href="http://cn.gravatar.com/" target="_blank">Gravatar官网</a>注册属于自己的帐号。</li>
                    <li>在Gravatar官网，上传自己的头像即可。</li>
                    <li>修改头像也是同样原理，只需要修改Gravatar官网上自己的头像。</li>
                    <li>记得刷新！</li>
                </ul>

                <br>

                <h4>简而言之，本网站头像将与你在Gravatar上的头像保持一致。<small>（通过你注册时使用的邮箱）</small></h4>

                <br>

                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary btn-block">修改头像</button>
                </div>

            </div>
        </div>
    </div>

@stop
