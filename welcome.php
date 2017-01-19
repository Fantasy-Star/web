<?php
//initialize the session
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
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>欢迎来到幻想者的世界！</title>
<?php $fromurl="index.php";
 if( $_SERVER['HTTP_REFERER'] == "" )
 {
 header("Location:".$fromurl); exit;
 }
 ?>
<!--最后记得去掉注释！！！-->
<?php
  include("headlink.php");
  ?>

<style type="text/css">


body {	
    font-family:"微软雅黑","幼圆", "楷体", "隶书", "华文隶书", "黑体",  "华文行楷";		
	background-color: #000000;
	background-image: url(image/back.jpg);
	background-attachment: fixed;
	background-clip: border-box;
	background-origin: border-box;
	background-size: cover;
	background-repeat: no-repeat;
	margin: 0;
	text-align:center;
  color:#fff;
}
#header {
	width: 1000px;
	height: 200px;
	margin: 0 auto;
	position: relative;
}
.blend
{	
    background:url(image/bar1.png);
	mix-blend-mode: hard-light;
}

#content {
}
#content #maincontent {

}


.videostyle
{
	opacity: 0.9;
	padding: 5px;
	border: 1px solid rgba(0,0,0,.2);
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	background-color: rgba(0,0,0,.5);
	color:#000000;
}


</style>

</head>

<body onload="ready();">
<?php
include("topwhite.php");
include("navigation.php");
?>

<div id="content" class="container">
  <h1 class="yunyou-bgblur yunyou-background">还没想好放什么<br>=w=</h1>
  <div id="maincontent"  class="embed-responsive embed-responsive-16by9 hidden-xs">
    <video class="videostyle yunyou-bgblur " controls="controls">
      <!--<source src="video/yunyousection1.mp4">-->
    </video>
  </div>
</div>
<?php
 include("copyfoot.php");
?>


</body>
</html>