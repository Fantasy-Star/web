@extends('layouts.default')
@section('title', '关于')

@section('content')
  <h1>关于</h1>
  <hr>
  <?php  $mail_address = "me@yunyoujun.cn"; ?>
  <p>
    <a href="mailto:<?php $mail_address; ?>" style="color: #ccc;">
      <span class="glyphicon glyphicon-envelope"></span>
    </a>
     · Email：
     <a href="mailto:<?php echo $mail_address; ?>" style="color: #ccc;">
       <?php echo $mail_address; ?>
     </a>
  </p>
@stop
