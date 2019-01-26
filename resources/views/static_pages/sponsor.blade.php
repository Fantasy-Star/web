@extends('layouts.default')
@section('title', '功德簿')

@section('content')
  <div class="jumbotron" style="padding-bottom:0px;">
    <div class="page-header">
      <h1> <i class="fa fa-money text-success"></i> 功德簿 <small>Fantasy Star</small></h1>
    </div>

    <p>
      因为是自己一个人业余做的东西，除了实力有限，精力有限，想法有限……之外，某种意义上 <i class="fa fa-money text-success"></i> 金钱也有限。
      <br>
        = = ，并没有什么社团拨款的项目经费来源，所以现在的服务器和域名以及企业邮箱是挂在我个人付费的域名和服务器上的。（<del>也挂了自己别的东西啦</del>）
        林林总总，也算是一个不小的支出。
    </p>

    <blockquote>
        <h3 class="text-center">当前支出</h3>
        <ul>
            <li>现在还是学生，所以用的阿里云学生服务器，一年在120元。（需要续费）（自己其他东西的是挂在腾讯的学生云服务器，也是120元左右）</li>
            <li>域名用的自己yunyoujun.cn域名下的二级域名，已备案，目前支出在140元。（需要续费）</li>
            <li>企业邮箱挂在了另买的一个elpsy.cn域名下，未备案，支出165元。（需要续费）</li>
            <li>邮箱服务器是腾讯企业邮箱，暂时是免费的。</li>
        </ul>
    </blockquote>

    <p class="text-center">
        所以我决定在这里<del>不知羞耻地</del>放下自己的
        <span class="text-primary" data-toggle="tooltip" data-placement="top" title="账号：15000985609"><strong>支付宝</strong></span>和
        <span class="text-success" data-toggle="tooltip" data-placement="top" title="微信号：QQ910426929"><strong>微信</strong></span>账号。
      <br>
        <div id="pay" class="text-center">
          <div class="m-b-10">
            <button class="btn btn-primary" role="button" data-toggle="collapse" data-target="#alipay" data-parent="#pay">
                支付宝收款二维码
            </button>
            <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#wechatpay" data-parent="#pay">
                <i class="fa fa-wechat"></i> 微信收款二维码
            </button>
          </div>
          <div class="row">
              <div class="collapse col-md-6" id="alipay">
                  <div class="well text-center">
                      <img style="max-height: 500px;" class="img-thumbnail" src="{{ asset('/assets/img/QRcode/支付宝收款.jpg') }}" alt="支付宝收款：15000985609">
                  </div>
              </div>
              <div class="collapse col-md-6" id="wechatpay">
                  <div class="well text-center">
                      <img style="max-height: 500px;" class="img-thumbnail" src="{{ asset('/assets/img/QRcode/微信收款.png') }}" alt="微信收款：QQ910426929">
                  </div>
              </div>
          </div>
        </div>
      <br>

    </p>

      <p class="text-center">
          如果单笔赞助数目大于两元的话（记得打上备注~），我会在下面用表格这般公示出来。(时间肯定会有延迟啦！)
          <br>
          <small>获得的赞助都将用于网站开发所需的服务器与域名费用等。</small>
      </p>

      <div class="table-responsive">
      <table class="table table-hover text-center">
          {{--table-condensed --}}
          <tr class="">
              <th class="text-center"><i class="fa fa-list-ol"></i></th>
              <th class="text-center"><i class="fa fa-user"></i></th>
              <th class="text-center"><i class="glyphicon glyphicon-yen text-success"></i></th>
              <th class="text-center"><i class="fa fa-calendar"></i></th>
          </tr>
          <tr>
              <td>1</td>
              <td>杨一苇</td>
              <td>9.99</td>
              <td>2017-09-07</td>
          </tr>
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
          </tr>
      </table>
      </div>

      <p class="text-center">
          Orz 拜谢！
          <br>
          <img style="max-width:250px;" src="/assets/img/yunyoujun/Orz.png" alt="Orz">
      </p>

  </div>

  <!-- @include('plugins.changyan', ['sid' => 'sponsor']) -->

@stop
