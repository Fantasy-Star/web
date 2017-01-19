<?php require_once('Connections/mymember.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>幻星科幻协会-资源</title>


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
    background:url(image/bar4.png);
	mix-blend-mode: hard-light;
}



</style>

</head>

<body onload="ready();">
<?php
include("topwhite.php");
include("navigation.php");
?>

		<div id="source">
					<div class="row content">


                 <div class="col-lg-12 " style="height:auto;margin:7px;">

						<div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
							<h1 class="text-center">百度网盘</h1>
                            <br>
							<p class="lead text-center">
                            用户名：幻星科幻之科技
                            </p>
                            <p class="lead text-center">密码：hxkhkjb</p>


                 </div>



						</div>
					</div>
			</div>

<?php
 include("copyfoot.php");
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>