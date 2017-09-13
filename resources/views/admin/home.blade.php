@extends('admin.default')
@section('title', '后台主页')
<section class="Hui-article-box">
    <nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/" class="maincolor">首页</a>
        <span class="c-999 en">&gt;</span>
        <span class="c-666">我的桌面</span>
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            <p class="f-20 text-success">Fantasy Star
                <span class="f-14">Admin</span>
                后台管理界面</p>
            <p>当前登录IP：<span><?php echo $_SERVER['REMOTE_ADDR'];?></span></p>
            {{--<p>登录次数：18 </p>--}}
            {{--<p>上次登录IP：222.35.131.79.1  上次登录时间：2014-6-14 11:19:55</p>--}}

            {{--<table class="table table-border table-bordered table-bg">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th colspan="7" scope="col">信息统计</th>--}}
                {{--</tr>--}}
                {{--<tr class="text-c">--}}
                    {{--<th>统计</th>--}}
                    {{--<th>资讯库</th>--}}
                    {{--<th>图片库</th>--}}
                    {{--<th>产品库</th>--}}
                    {{--<th>用户</th>--}}
                    {{--<th>管理员</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--<tr class="text-c">--}}
                    {{--<td>总数</td>--}}
                    {{--<td>92</td>--}}
                    {{--<td>9</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>8</td>--}}
                    {{--<td>20</td>--}}
                {{--</tr>--}}
                {{--<tr class="text-c">--}}
                    {{--<td>今日</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                {{--</tr>--}}
                {{--<tr class="text-c">--}}
                    {{--<td>昨日</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                {{--</tr>--}}
                {{--<tr class="text-c">--}}
                    {{--<td>本周</td>--}}
                    {{--<td>2</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                {{--</tr>--}}
                {{--<tr class="text-c">--}}
                    {{--<td>本月</td>--}}
                    {{--<td>2</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                    {{--<td>0</td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
            {{--</table>--}}

            <table class="table table-border table-bordered table-bg mt-20">
                <thead>
                <tr>
                    <th colspan="2" scope="col">服务器信息</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th width="30%">服务器计算机名</th>
                    <td><span id="lbServerName"><?php echo $_SERVER['SERVER_NAME'];?></span></td>
                </tr>
                <tr>
                    <td>PHP版本</td>
                    <td><?php echo PHP_VERSION;?></td>
                </tr>
                <tr>
                    <td>本系统所在根目录</td>
                    <td><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
                </tr>
                <tr>
                    <td>服务器IP地址</td>
                    <td><?php echo $_SERVER['SERVER_ADDR']; ?></td>
                </tr>
                <tr>
                    <td>服务器域名</td>
                    <td><?php echo $_SERVER["HTTP_HOST"]; ?></td>
                </tr>
                <tr>
                    <td>服务器端口 </td>
                    <td><?php echo $_SERVER['SERVER_PORT'];?></td>
                </tr>
                <tr>
                    <td>服务器操作系统 </td>
                    <td><?php echo php_uname(); ?></td>
                </tr>
                <tr>
                    <td>服务器的语言种类 </td>
                    <td><?php echo  $_SERVER['HTTP_ACCEPT_LANGUAGE'];?></td>
                </tr>
                <tr>
                    <td>服务器 CGI 版本 </td>
                    <td><?php echo $_SERVER['GATEWAY_INTERFACE'] ?></td>
                </tr>
                <tr>
                    <td>服务器通信协议</td>
                    <td><?php echo $_SERVER['SERVER_PROTOCOL'];?></td>
                </tr>
                <tr>
                    <td>服务器当前时间 </td>
                    <td><?php echo date("Y-m-d H:i:s",$_SERVER['REQUEST_TIME']); ?></td>
                </tr>
                </tbody>
            </table>
        </article>
     </div>
</section>
