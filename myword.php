<?php require_once('Connections/mymember.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}

?>
<!doctype html>
<html>
<head>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $_SESSION['webname']; ?>-我的留言</title>



<?php
include("headlink.php");
  ?>


</head>

<body onload="ready();">
<?php
include("topwhite.php");
?>

		<div id="word">
				<div class="container">
					<div class="row yunyou-background yunyou-bgblur">

					<h2>我的留言</h2>
                    
                    <?php 
			 $sql=mysql_query("select count(*) as total from yourword where ID='".$_SESSION['MM_Username']."'",$mymember);
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
	     echo "暂时还没有发表过留言哦!";
		 
	   }
	   else {
		   ?>
           
		   <hr>
           <?php
		   }
		$sql1=mysql_query("select * from yourword  where ID='".$_SESSION['MM_Username']."'order by WTIME desc limit ".($page-1)*$pagesize.",$pagesize ",$mymember);

			 while($info=mysql_fetch_array($sql1))
			 {
				 ?>
                 <div class="col-lg-12 form-control media" style="height:auto;margin: 0 auto;margin-bottom: 15px;">
                 	<input type="hidden" value="<?php echo $info['WID'];?>">
	                <div >
		                <div class="form-group">
		                <h4><?php if($info['NOBODY']==0){?><span class="glyphicon glyphicon-star">&nbsp;&nbsp;</span>
<?php } else{?><span class="glyphicon glyphicon-star-empty">&nbsp;&nbsp;</span><?php } ?>
		                <?php echo $info['WTITLE'];?></h4>
		                </div>
		                <div id="main">
		                <div align="left" class="form-control has-feedback" style="height:auto;"><?php echo $info['WMESSAGE'];?><i class="glyphicon glyphicon-comment form-control-feedback"></i></div>
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
        <li><a href="myword.php?page=1" class="glyphicon glyphicon-fast-backward" title="首页"></a></li>
        <li><a href="myword.php?page=<?php echo $page-1;?>" class="glyphicon glyphicon-step-backward" title="前一页"></a></li>
        <?php
		  }
		   if($pagecount<=5){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="myword.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php
		     }
		   }else{
			   if($pagecount>$page+5){
		   for($i=$page;$i<=$page+5;$i++){	 
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="myword.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php }}
		else{
			for($i=$pagecount-4;$i<=$pagecount;$i++){	 
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="myword.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
	<?php		
			}
		}
		?>
        <li><a href="myword.php?page=<?php echo $page+1;?>" title="后一页" class="glyphicon glyphicon-step-forward"></a></li> 
        <li><a href="myword.php?page=<?php echo $pagecount;?>" title="尾页" class="glyphicon glyphicon-fast-forward"></a></li>
        <?php }?>
        </ul>
</nav>

        <div align="center">目前共发表过 <?php echo $total;?> 条留言
        <br>
        <span class="glyphicon glyphicon-star">：实名&nbsp; <span class="glyphicon glyphicon-star-empty">：匿名</div>

        <hr>

						</div>
					</div>
			</div>

<?php
 include("copyfoot.php");
?>

</body>
</html>