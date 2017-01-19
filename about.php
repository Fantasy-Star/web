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

<?php
  include 'headlink.php';
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
	color:rgba(255,255,255,1.00);
}
#header {
	width: 1000px;
	height: 200px;
	margin: 0 auto;
	position: relative;
}
.blend
{	
    background:url(image/bar6.png);
	mix-blend-mode: hard-light;
}




</style>

</head>

<body onLoad="ready()">
<?php
include("topwhite.php");
include("navigation.php");
?>

<div id="myCarousel" class="carousel slide content">

	<!-- 轮播（Carousel）项目 -->
	<div class="carousel-inner">
		<div class="item active">
        <div class="col-lg-12">
            <div class="col-lg-3">
			<img src="image/logo/fantasystar.png" alt="First slide">
            </div>
            <div class="col-lg-9" >
            <h2>幻星科幻协会</h2>
                        <p align="left">幻星科幻协会建立于2014年春季，协会由一群热爱科幻的上海海事大学学生自发建立，致力于为校内的科幻爱好者提供更好的交流平台。协会鼓励成员们自由思考，广泛阅读，继承科幻先行者的意志.除每月定期的科幻电影鉴赏晚会和读书会以外，协会也积极参加科幻苹果核的各项活动以促进与其他协会的交流。协会目前隶属于上海海事大学图书馆，同时也是科幻苹果核的成员。</p>
            </div>
       
		</div>
        </div>
		<div class="item">
        <div class="col-lg-12">
        <div class="col-lg-3">
			<img src="image/logo/movie.png" alt="Second slide">
            </div>
            <div class="col-lg-9">
            <h2>电影部</h2>
            <p>看片儿</p>
            </div>
            
            </div>
		</div>
        <div class="item">
        <div class="col-lg-12">
        <div class="col-lg-3">
			<img src="image/logo/novel.png" alt="Third slide">
            </div>
            <div class="col-lg-9">
            <h2>小说部</h2>
            <p>吹牛儿</p>
            </div>
            
            </div>
		</div>
        <div class="item">
        <div class="col-lg-12">
        <div class="col-lg-3">
			<img src="image/logo/technology.png" alt="Fourth slide">
            </div>
            <div class="col-lg-9">
            <h2>科技部</h2>
            <p>学♂习♀</p>
            </div>
            
            </div>
		</div>
		<div class="item">
        <div class="col-lg-12">
        <div class="col-lg-3">
			<img src="image/logo/association.png" alt="Fifth slide">
            </div>
            <div class="col-lg-9">
            <h2>外联部</h2>
            <p>脱单</p>
            </div>
            
            </div>
		</div>
        <div class="item">
        <div class="col-lg-12">
        <div class="col-lg-3">
			<img src="image/logo/xingzheng.png" alt="Sixth slide">
            </div>
            <div class="col-lg-9">
            <h2>行政部</h2>
            <p>orz</p>
            </div>
            
            </div>
		</div>
	</div>
    <div style="margin-top:70px;">
	<!-- 轮播（Carousel）指标 -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
		<li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
	</ol>   
</div>
	<!-- 轮播（Carousel）导航 -->
	<a class="carousel-control left" href="#myCarousel" 
	   data-slide="prev"></a>
	<a class="carousel-control right" href="#myCarousel" 
	   data-slide="next"></a>
</div>

<?php
 include("copyfoot.php");
?>

</body>
</html>