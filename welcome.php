<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
  $_SESSION['webname'] = "幻星科幻协会";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $_SESSION['webname']; ?>-欢迎来到幻想者的世界！</title>
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
.popover{
  background-color: rgba(0,0,0,0.6);
  color: #fff;
}
.popover.bottom > .arrow:after { border-bottom-color: rgba(0,0,0,0.6);}
</style>

</head>

<body onload="ready();">
<?php
include("topwhite.php");
?>
<div>
  <h1>=w=这里是首页<small>|还没想好放什么</small></h1>
  <hr>
</div>
<div class="jumbotron yunyou-bgblur yunyou-background">
  <h1>幻星科幻协会</h1>
  <p>玩玩线条吧~</p>
  <p><button id="heiya" type="button" class="btn btn-primary btn-lg" href="#" role="button" data-container="body" data-toggle="popover" data-placement="bottom" data-content="(￣^￣゜)嘿呀">点我也没用</button></p>
  <div id="smallgame" style="display: none;">
  <iframe src="HTML5-Asteroids/index.html" frameborder="0" width="800" height="560"></iframe>
  </div>
</div>



<script type="text/javascript">
  $(function () {
  $('[data-toggle="popover"]').popover()
})
  function show(){
document.getElementById("smallgame").style.display="";
  }
</script>

<script type="text/javascript">
$("#heiya").click(function(){

<!-- 
//平台、设备和操作系统
var system ={
win : false,
mac : false,
xll : false
};
//检测平台
var p = navigator.platform;
system.win = p.indexOf("Win") == 0;
system.mac = p.indexOf("Mac") == 0;
system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
//跳转语句，如果是手机访问就自动跳转到wap.baidu.com页面
if(system.win||system.mac||system.xll){
 show();
}else{
//手机
}
-->
        });
</script>

<?php
 include("copyfoot.php");
?>

</body>
</html>