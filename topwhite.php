<?php require_once('Connections/mymember.php');
 ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
	session_destroy();
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>

<!--防止-->
<?php 
$fromurl="index.php";
// if( $_SERVER['HTTP_REFERER'] == "" )
// {
// header("Location:".$fromurl); exit;
// }
if(!isset($_SESSION['MM_Username']))
 {
 header("Location:".$fromurl); exit;
 }
 ?>
 
 
 <link rel="shortcut icon" type="image/x-icon" href="logo.ico" media="screen" />
<link rel="Bookmark" href="logo.ico" >

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: rgba(0,0,0,0.5);">
  <div class="container-fluid"> 

    <div class="navbar-header ">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#"><span> 欢迎你,幻想者<?php echo $_SESSION['MM_Username']; ?>号。 </span></a>

      </div>

    <div class="collapse navbar-collapse" id="defaultNavbar1"  style="font-size:large;">
      <ul class="nav navbar-nav navbar-right">
       <?php
mysql_select_db($database_mymember, $mymember);
  $sqlborrow=mysql_query("select count(*) as total from borrow where ID='".$_SESSION['MM_Username']."'",$mymember);
  $infoborrow=mysql_fetch_array($sqlborrow);
  $totalborrow= $infoborrow['total'];

    if(isset($_SESSION['MM_Username'])){
      ?>
        <li id="welcome"><a href="welcome.php" title="首页"><span class="glyphicon glyphicon-home" title="主页"></span></a></li>
        <li><a href="member.php">成员</a></li>
        <li><a href="book.php">藏书</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="个人中心">个人中心<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" style="font-size: large;">
            <li><a href="userupdate.php"><span class="glyphicon glyphicon-user"></span>&nbsp;个人信息</a></li>
            <li><a href="borrowcondition.php"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;借阅情况
            <?php if($totalborrow!=0){ ?>
            <span class="badge"><?php echo $totalborrow;?></span>
            <?php } ?>
            </a></li>   
            <li><a href="mycomment.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;我的评论</a></li>
            <li><a href="myword.php"><span class="glyphicon glyphicon-edit"></span>&nbsp;我的留言</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo $logoutAction ?>"><span class="glyphicon glyphicon-off"></span>&nbsp;注销账号</a></li>
          </ul>
        </li>
        <?php
        }else{?>
        <li><a >登录</a></li>
        <li><a >注册</a></li>
        <?php } ?>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>