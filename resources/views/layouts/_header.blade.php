<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container-fluid">
    <div class="col-md-12">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#fs-navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <a class="navbar-brand" href="{{ route('home') }}">
          <img width="25" height="25" src="http://www.gravatar.com/avatar/5b668c9450f847d0c5b6ce4ae53ca6b6" alt="FantasyStar"/>
        </a> -->
        <a class="navbar-brand" href="{{ route('home') }}">
          <strong class="text-primary">Fantasy Star</strong> <strong class="text-muted"></strong>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="fs-navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{ route('books.index') }}"><i class="fa fa-book"></i> 藏书</a></li>
          <li><a href="{{ route('books.index') }}"><i class="fa fa-comments-o"></i> 社区</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::check())
            <li><a href="{{ route('users.index') }}">成员</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img class="img-circle" alt="Summer" src="{{ Auth::user()->gravatar('20') }}" />
                {{ Auth::user()->name }} <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('users.show', Auth::user()->id) }}">个人中心</a></li>
                <li><a href="{{ route('users.edit', Auth::user()->id) }}">编辑资料</a></li>
                <li class="divider"></li>
                <li>
                  <a id="logout" href="#">
                    <form action="{{ route('logout') }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                    </form>
                  </a>
                </li>
              </ul>
            </li>
          @else
            <li><a href="{{ route('login') }}">登录</a></li>
            <li><a href="{{ route('signup') }}">注册</a></li>
          @endif
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </div><!-- /.container-fluid -->
</nav>
