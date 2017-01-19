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
	
  $logoutGoTo = "../index.php";
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
<!-- TemplateBeginEditable name="doctitle" -->
<title>欢迎来到幻想者的世界！</title>
<!-- TemplateEndEditable -->
<?php /*?><?php $fromurl="index.php";
 if( $_SERVER['HTTP_REFERER'] == "" )
 {
 header("Location:".$fromurl); exit;
 }
 ?><?php */?>
<!--最后记得去掉注释！！！-->

<link rel="shortcut icon" type="image/x-icon" href="../logo.ico" media="screen" />
<link rel="Bookmark" href="../logo.ico" >
<link rel="stylesheet" type="text/css" href="../css/font.css">

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
	top: 13px;
	left: 35px;
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


body {
	background-color: #000000;
	background-image: url(../image/back.jpg);
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
#header {
	width: 1000px;
	height: 200px;
	margin: 0 auto;
	position: relative;
	/*background:url(image/bar.png);*/
}
#content {
}
#content #maincontent {
	float: left;
}
#content #contentright {
	float: right;
}

#foot {
	width: 1000px;
	margin: auto;
}
#test {
	font-family: "幼圆", "楷体", "隶书", "华文隶书", "黑体", "微软雅黑", "华文行楷";
	font-size: 72px;
	color: rgba(255,255,255,1);
	font-weight: bolder;
	text-align: center;
}
#keysounds{
	position:relative;
	top:-165px;
	opacity:0.5;
}

.dodge
{	
    background:url(../image/bar1.png);

	mix-blend-mode: hard-light;
	}

#dao ul{list-style-type:none;}
#dao li{
	float: right;	
	display:block;width:166px;
	margin-top:65px;
}
.astyle
{   display:block;width:166px;height:75px;
     text-align:center; 
	 color: #FFFFFF; }
.astyle:hover{
	background:url(../image/bar.png);
}

</style>
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body onload="ready();">
<header class="top">
  <div class="toplr" id="top_left" style="float: left; margin-left: 2%; font-family: '微软雅黑', Arial, '宋体', sans-serif; font-weight: bold;"> <span> 欢迎你,幻想者<?php echo $_SESSION['MM_Username']; ?>号。 </span> </div>
  <div class="toplr" id="top_right" style="float: right; margin-right: 2%;font-family: 微软雅黑,Arial,宋体,sans-serif;font-weight: bold;">
   <a href="../welcome.php" title="主页">
  <span style="margin-right:12px;">主页</span>
  </a>
  <a href="../userupdate.php" title="个人资料">
  <span style="margin-right:12px;">个人资料</span>
  </a>
   <a href="<?php echo $logoutAction ?>" title="注销"> <span>注销</span></a> 
   </div>
</header>

<header id="header">
<!--<img class="dodge" src="image/bar2.png" alt=""  align="middle"/>-->
<div class="dodge" style="width=1000px;height:181px;">
  <div id="dao">
   <ul>
   <li><a class="astyle" href="../member.php"></a></li>  
   <li><a class="astyle" href="../book.php"></a></li>
   <li><a class="astyle" href="../source.php"></a></li>
   <li><a class="astyle" href="../word.php"></a></li>
   <li><a class="astyle" href="../about.php"></a></li>
   </ul>
 </div>
</div>


  <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
    <div class="flipper"> <a href="http://weibo.com/u/3784345967?from=myfollow_all&is_all=1#_rnd1475328154475" target="_blank">
      <div class="front"> <img src="../image/logo.png" alt="" width="110" height="110" id="logo"/> </div>
      <div class="back"> <img src="../image/logo2.png" width="110" height="110" alt="" style="opacity:0.7"/> </div>
      </a> </div>
  </div>
  
  



</header>
<div id="test"> 敬请期待 </div>
<div id="content">
  <div id="maincontent"></div>
  <div id="contentright"></div>
</div>
<footer id="foot"><img src="../image/bottom.png" width="1000" height="70" alt=""/></footer>
</body>
</html>