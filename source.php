<?php require_once('Connections/mymember.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_SESSION['webname'];?>-资源</title>


<?php
  include 'headlink.php';
  ?>

</head>

<body onload="ready();">
<?php
include("topwhite.php");

?>
<div>
  <h1>资源<small></small></h1>
  <hr>
</div>
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