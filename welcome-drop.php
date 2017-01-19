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
<?php /*?><?php $fromurl="index.php";
 if( $_SERVER['HTTP_REFERER'] == "" )
 {
 header("Location:".$fromurl); exit;
 }
 ?><?php */?>
<!--最后记得去掉注释！！！-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎来到幻想者的世界！</title>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<link rel="stylesheet" href="style/default.css" />
<link rel="stylesheet" href="style/custom.css" />

<link rel="shortcut icon" type="image/x-icon" href="logo.ico" media="screen" />
<link rel="Bookmark" href="logo.ico" >
<link rel="stylesheet" type="text/css" href="css/font.css">

<style type="text/css">
.flip-container {
	perspective: 1000;
}
/* flip the pane when hovered */
.flip-container:hover .flipper, .flip-container.hover .flipper {
	transform: rotateY(180deg);
}
.flip-container, .front, .back {
	width: 110px;
	height: 110px;
	position: absolute;
	top: 48px;
	left: 100px;
}
/* flip speed goes here */
.flipper {
	transition: 0.6s;
	transform-style: preserve-3d;
	position: relative;
}
/* hide back of pane during swap */
.front, .back {
	backface-visibility: hidden;
	position: absolute;
	top: 0;
	left: 0;
}
/* front pane, placed above back */
.front {
	z-index: 2;
}
/* back, initially hidden pane */
.back {
	transform: rotateY(180deg);
}
</style>
<style type="text/css">
body {
	background-color: #000000;
	background-image: url(image/back.jpg);
	background-attachment: fixed;
	background-clip: border-box;
	background-origin: border-box;
	background-size: cover;
	background-repeat: no-repeat;
	margin: 0;
	text-align:center;
}
audio {
	filter: alpha(opacity=40); /*IE滤镜，透明度50%*/
	-moz-opacity: 0.4; /*Firefox私有，透明度50%*/
	opacity: 0.4;/*其他，透明度50%*/
}
.top {
	font-size: medium;
	background-color: #FFFFFF;
	filter: alpha(opacity=50); /*IE滤镜，透明度50%*/
	-moz-opacity: 0.5; /*Firefox私有，透明度50%*/
	opacity: 0.5;/*其他，透明度50%*/
	color: #000000;
	height: 30px;
}
.toplr {
	position: relative;
	top: 10%;
}
#keysounds{
	position:relative;
	top:53px;
	margin-left:600px;
}
#foot {
	width: 1000px;
	margin: auto;
}
</style>


</head>

<body onload="ready();">

<header class="top">
  <div class="toplr" id="top_left" style="float: left; margin-left: 2%; font-family: '微软雅黑', Arial, '宋体', sans-serif; font-weight: bold;"> <span> 欢迎你,幻想者<?php echo $_SESSION['MM_Username']; ?>号。 </span> </div>
  <div class="toplr" id="top_right" style="float: right; margin-right: 2%;font-family: 微软雅黑,Arial,宋体,sans-serif;font-weight: bold;">
   <a href="welcome.php" title="主页">
  <span style="margin-right:12px;">主页</span>
  </a>
  <a href="userupdate.php" title="个人资料">
  <span style="margin-right:12px;">个人资料</span>
  </a>
   <a href="<?php echo $logoutAction ?>" title="注销"> <span>注销</span></a> 
   </div>
</header>

<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
    <div class="flipper"> <a href="http://weibo.com/u/3784345967?from=myfollow_all&is_all=1#_rnd1475328154475" target="_blank">
      <div class="front"> <img src="image/logo.png" alt="" width="110" height="110" id="logo"/> </div>
      <div class="back"> <img src="image/logo2.png" width="110" height="110" alt="" /> </div>
      </a>
    </div>
</div>

  <audio id="keysounds" title="Key Sounds Label - 風を待った日" controls autoplay loop >
    <source src="sound/Key Sounds Label - 風を待った日 - 纯音乐版.mp3" type="audio/mp3">
  </audio>

<div class="general feature_tour" >
  <div class="middle" >
        <div class="wrapper" >
        
<p class="pageTitle" >上海海事大学幻星科幻协会</p>

         <div class="tab"><a href="#" class="current"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a>
        </div>
              <div class="mask">
                  <div class="maskCon">
                  
                  
                      <div id="con1" class="innerCon">111111111111</div>
                      
                      <div id="con2" class="innerCon">222222222222</div>
                      
                      <div id="con3" class="innerCon">33333333333</div>
                      
                      <div id="con4" class="innerCon">4444444444</div>
                      
                      <div id="con5" class="innerCon">5555555555</div>
                      
                      <div id="con6" class="innerCon">5555555555</div>
                      
                      <div id="con7" class="innerCon">55777555</div>
                      
                      
                  </div>
              </div>

        </div>
  </div>
</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-3174937-15");
pageTracker._trackPageview();
} catch(err) {}</script>

<footer id="foot"><img src="image/bottom.png" width="1000" height="70" alt=""/></footer>

</body>
</html>