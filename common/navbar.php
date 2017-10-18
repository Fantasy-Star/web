<?php
  @$totalborrow = getTotalBorrow();

  $fromurl="../index.php";
  // if(!isset($_SESSION['MM_Username']))
  //  {
  //  header("Location:".$fromurl); exit;
  //  }
?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: rgba(0,0,0,0.7);"><!-- navbar-fixed-top -->
  <div class="container-fluid"> 

    <div class="navbar-header ">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>

      <a class="navbar-brand dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" title="个人中心">
      <span> 欢迎你,幻想者<?php if(isset($_SESSION['MM_Username'])) echo $_SESSION['MM_Username'].'号'; ?>。</span>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="defaultNavbar1"  style="font-size:large;">
      <ul class="nav navbar-nav navbar-right">
         <?php

      if(isset($_SESSION['MM_Username'])){
        ?>
          <li id="welcome"><a href="../welcome.php" title="首页"><span class="glyphicon glyphicon-home" title="主页"></span></a></li>
          <li><a href="../member.php">成员</a></li>
          <li><a href="../book.php">藏书</a></li>
          <li><a href="../activity/index.php">活动</a></li>
          <li><a href="../source.php">资源</a></li>
          <li><a href="../word.php">留言</a></li>
          <li><a href="../about.php">关于</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="个人中心">个人中心<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu" style="font-size: large;">
              <li><a href="../userupdate.php"><span class="glyphicon glyphicon-user"></span>&nbsp;个人信息</a></li>
              <li><a href="../borrowcondition.php"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;借阅情况
              <?php if($totalborrow!=0){ ?>
              <span class="badge"><?php echo $totalborrow;?></span>
              <?php } ?>
              </a></li>   
              <li><a href="../mycomment.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;我的评论</a></li>
              <li><a href="../myword.php"><span class="glyphicon glyphicon-edit"></span>&nbsp;我的留言</a></li>
              <li class="divider"></li>
              <li><a href="../user/doUserAction.php?act=loginOut"><span class="glyphicon glyphicon-off"></span>&nbsp;注销账号</a></li>
            </ul>
          </li>
          <?php }else{ ?>
        <li><a href="../index.php">登录</a></li>
        <li><a href="../register.php">注册</a></li>
        <?php } ?>
      </ul>
    </div>

    <div class="collapse navbar-collapse" id="defaultNavbar1"  style="font-size:large;">
      <ul class="nav navbar-nav navbar-right">

      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>