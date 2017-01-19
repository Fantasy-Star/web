<?php require_once('Connections/mymember.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "yourword")) {
  $insertSQL = sprintf("INSERT INTO yourword (ID,WTITLE, WMESSAGE,NOBODY) VALUES (%s,%s, %s,%s)",
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
					   GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['message'], "text"),
                       GetSQLValueString($_POST['nobody'], "int"));

  mysql_select_db($database_mymember, $mymember);
  $Result1 = mysql_query($insertSQL, $mymember) or die(mysql_error());

  $insertGoTo = "word.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>幻星科幻协会-留言</title>



<?php
include("headlink.php");
  ?>


<style type="text/css">


body {	
    font-family:"微软雅黑","幼圆", "楷体", "隶书", "华文隶书", "黑体",  "华文行楷";		
	background-color: #000000;
	background-image: url(image/back.jpg);
	background-attachment: fixed;
	background-size: cover;
	background-repeat: no-repeat;
	margin: 0;
	text-align:center;
	color:rgba(255,255,255,1.00);
  padding-top: 60px;
}
#header {
	width: 1000px;
	height: 200px;
	margin: 0 auto;
	position: relative;
}
.blend
{	
    background:url(image/bar5.png);
	mix-blend-mode: hard-light;
}



</style>

</head>

<body onload="ready();">
<?php
include("topwhite.php");
include("navigation.php");
?>

		<div id="word">
				<div class="container">
					<div class="row content">
                    
                    <?php 
			 $sql=mysql_query("select count(*) as total from yourword",$mymember);
	   $info=mysql_fetch_array($sql)or die("Invalid query: " . mysql_error());
	$total=$info['total'];


	       $pagesize=5;
		   if ($total<=$pagesize){
		      $pagecount=1;
			} 
			if(($total%$pagesize)!=0){
			   $pagecount=intval($total/$pagesize)+1;
			
			}else{
			   $pagecount=$total/$pagesize;			
			}
			
			if((@$_GET['page'])==""){
			    $page=1;
			
			}else{
			    $page=intval($_GET['page']);
			
			}

	if($total==0)
	   {
	     echo "暂时还没有人评论哦!";
		 
	   }
	   else {
		   ?>
           
		   <hr>
           <?php
		   }
		$sql1=mysql_query("select * from yourword limit ".($page-1)*$pagesize.",$pagesize ",$mymember);

			 while($info=mysql_fetch_array($sql1))
			 {
				 ?>
                 <div class="col-lg-12 form-control media" style="height:auto;margin: 0 auto;margin-bottom: 15px;">
                 	<input type="hidden" value="<?php echo $info['WID'];?>">
	                <div class="col-lg-2">
		                <div class="media" style="padding:10px 0px 0px 0px;">
		                <?php  if($info['NOBODY']==0){ ?>
		                <img src="image/myhead/default-small.png" alt="_(:3 」∠)_图片好像没出来" style="opacity: 0.7;">
		                <?php }else{ ?>
						<img src="image/myhead/nobody-small.jpg" alt="_(:3 」∠)_图片好像没出来" style="opacity: 0.7;" class="img-circle">
		                <?php	} 
$sqlname=mysql_query("select * from member where ID='".$info['ID']."'",$mymember);
$infoname=mysql_fetch_array($sqlname);
		                ?>
					<div style="padding-top: 6px;"><?php if($info['NOBODY']==0) echo $infoname['CLASS'];?></div>

					<div><?php if($info['NOBODY']==0) echo $infoname['NAME'];else echo "某匿名的幻想者"?>&nbsp;</div>

		                </div>
	                </div>
	                <div class="col-lg-10">
		                <div class="form-group">
		                <h4><span class="glyphicon glyphicon-star">&nbsp;&nbsp;</span><?php echo $info['WTITLE'];?></h4>
		                </div>
		                <div id="main">
		                <div align="left" class="form-control has-feedback"><?php echo $info['WMESSAGE'];?><i class="glyphicon glyphicon-comment form-control-feedback"></i></div>
						<div align="right" style="padding-top: 10px;"><a href="deleteyourword.php?WID=<?php echo $info['WID'];?>" onclick="return confirm('确定要删除这条留言吗？')"><?php if($_SESSION['MM_Username']==$info['ID']) echo "删除";?> </a>
		                &nbsp;
						<?php echo $info['WTIME'];?>
		                </div>
		                
		                </div>

	                </div>

                </div>

                 <?php
				 } 
             ?>

 <nav>
              <ul class="pagination">
        <?php
		  if($page>=2)
		  {
		  ?>
        <li><a href="word.php?page=1" class="glyphicon glyphicon-fast-backward" title="首页"></a></li>
        <li><a href="word.php?page=<?php echo $page-1;?>" class="glyphicon glyphicon-step-backward" title="前一页"></a></li>
        <?php
		  }
		   if($pagecount<=5){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="word.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php
		     }
		   }else{
			   if($pagecount>$page+5){
		   for($i=$page;$i<=$page+5;$i++){	 
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="word.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php }}
		else{
			for($i=$pagecount-4;$i<=$pagecount;$i++){	 
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="word.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
	<?php		
			}
		}
		?>
        <li><a href="word.php?page=<?php echo $page+1;?>" title="后一页" class="glyphicon glyphicon-step-forward"></a></li> 
        <li><a href="word.php?page=<?php echo $pagecount;?>" title="尾页" class="glyphicon glyphicon-fast-forward"></a></li>
        <?php }?>
        </ul>
</nav>

        <div align="center">目前共有 <?php echo $total;?> 条留言</div>

        <hr>

						<div class="col-sm-6">
							<div>
                       
								<h3>幻星科幻协会</h3>
                                <br>
								<ul class="text-left">
									<li><i class="glyphicon glyphicon-map-marker"></i>&nbsp;上海·浦东新区·临港新城·上海海事大学·中远图书馆</li>
                                    <br>
									<li><i class="glyphicon glyphicon-paperclip"></i>&nbsp;QQ群：182332107</li>
                                    <br>
									<li><i class="glyphicon glyphicon-earphone"></i>&nbsp;13917995827</li>
									<br>
                                    <li><i class="glyphicon glyphicon-envelope"></i>&nbsp;smuhxxh@163.com</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 text-left">
								<form method="POST" action="<?php echo $editFormAction; ?>" name="yourword" role="form" id="yourword">
                                <br>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" id="title" placeholder="您的主题" name="title" required>
										<i class="glyphicon glyphicon-bookmark form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<textarea class="form-control" rows="8" id="message" placeholder="您的留言内容" name="message" required></textarea>
										<i class="glyphicon glyphicon-comment form-control-feedback"></i>
									</div>
									
									  <div class="checkbox"  style="opacity: 0.6;">
									    <label>
									      <input type="checkbox" name="nobody" value="1">匿名留言
									    </label>
									  </div>

									<div class="form-group">
									<button type="submit" value="发&nbsp;&nbsp;&nbsp;表" class="btn btn-block btn-inverse" style="background-color: rgba(255,255,255,0.3);">发&nbsp;&nbsp;&nbsp;表</button>
                                    </div>
                                    <input type="hidden" name="MM_insert" value="yourword">
								</form>
						</div>
						</div>
					</div>
			</div>

<?php
 include("copyfoot.php");
?>

</body>
</html>