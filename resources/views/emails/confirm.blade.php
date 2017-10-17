<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>注册确认链接 - FantasyStar</title>
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <style>
      html, body {
          background-color: #fff;
          color: #636b6f;
          font-family: 'Raleway', sans-serif;
          font-weight: 100;
          height: 100vh;
          margin: 0;
      }

      .full-height {
          height: 100vh;
      }

      .flex-center {
          align-items: center;
          display: flex;
          justify-content: center;
      }

      .position-ref {
          position: relative;
      }

      .top-right {
          position: absolute;
          right: 10px;
          top: 18px;
      }

      .content {
          text-align: center;
      }

      .title {
          font-size: 84px;
      }

      .links > a {
          color: #636b6f;
          padding: 0 25px;
          font-size: 12px;
          font-weight: 600;
          letter-spacing: .1rem;
          text-decoration: none;
          text-transform: uppercase;
      }

      .m-b-md {
          margin-bottom: 30px;
      }
  </style>
</head>
<body>
  <div class="flex-center position-ref full-height">
      <div class="content">
          <div class="title m-b-md">
              Hello , Fantasy Star !
          </div>
          <h1>欢迎您加入<strong>幻星科幻协会</strong>！</h1>

          <div class="links">
            <a href="http://association.yunyoujun.cn">Fantasy Star</a>
            <a href="http://www.yunyoujun.cn/">YunYouJun</a>
            <a href="https://github.com/YunYouJun/FantasyStar-Web">GitHub</a>
          </div>

          <p class="links">
            <strong>请点击下面的链接完成注册：<strong>
            <a href="{{ route('confirm_email', $user->activation_token) }}">
              {{ route('confirm_email', $user->activation_token) }}
            </a>
          </p>

          <p>
            如果这不是您本人的操作，请忽略此邮件。
          </p>
      </div>
  </div>
</body>
</html>
