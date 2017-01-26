<?php require_once('Connections/mymember.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $_SESSION['webname']; ?>-我的评论</title>



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

					<h2>我的图书评论</h2>
                    
                    <?php 
			 $sql=mysql_query("select count(*) as total from bookcomment where ID='".$_SESSION['MM_Username']."'",$mymember);
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
	     echo "暂时还没有评论过图书哦!";
		 
	   }
	   else {
		   ?>
           
		   <hr>
           <?php
		   }
		$sql1=mysql_query("select * from bookcomment  where ID='".$_SESSION['MM_Username']."' order by CTIME desc limit ".($page-1)*$pagesize.",$pagesize",$mymember);

			 while($info=mysql_fetch_array($sql1))
			 {
				 ?>
                 <div class="col-lg-12 form-control media" style="height:auto;margin: 0 auto;margin-bottom: 15px;">
                 	<input type="hidden" value="<?php echo $info['WID'];?>">
	                <div >
		                <div class="form-group">
		        <?php			 $sqlbook=mysql_query("select * from book where FSBN='".$info['FSBN']."'",$mymember);
	   $infobook=mysql_fetch_array($sqlbook)or die("Invalid query: " . mysql_error()); ?>
		                <h4><?php echo $infobook['FSBOOK'];?></h4>
		                </div>
		                <div id="main">
		                <div align="left" class="form-control has-feedback" style="height:auto;"><?php echo $info['COMMENT'];?><i class="glyphicon glyphicon-comment form-control-feedback"></i></div>
						<div align="right" style="padding-top: 10px;"><a href="deletecomment.php?FSBN=<?php echo $info['FSBN'];?>&amp;CID=<?php echo $info['CID'];?>" onclick="return confirm('确定要删除这条留言吗？')"><?php if($_SESSION['MM_Username']==$info['ID']) echo "删除";?> </a>
		                &nbsp;
						<?php echo $info['CTIME'];?>
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
        <li><a href="mycomment.php?page=1" class="glyphicon glyphicon-fast-backward" title="首页"></a></li>
        <li><a href="mycomment.php?page=<?php echo $page-1;?>" class="glyphicon glyphicon-step-backward" title="前一页"></a></li>
        <?php
		  }
		   if($pagecount<=5){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="mycomment.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php
		     }
		   }else{
			   if($pagecount>$page+5){
		   for($i=$page;$i<=$page+5;$i++){	 
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="mycomment.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php }}
		else{
			for($i=$pagecount-4;$i<=$pagecount;$i++){	 
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="mycomment.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
	<?php		
			}
		}
		?>
        <li><a href="mycomment.php?page=<?php echo $page+1;?>" title="后一页" class="glyphicon glyphicon-step-forward"></a></li> 
        <li><a href="mycomment.php?page=<?php echo $pagecount;?>" title="尾页" class="glyphicon glyphicon-fast-forward"></a></li>
        <?php }?>
        </ul>
</nav>

        <div align="center">目前共发表过 <?php echo $total;?> 条评论</div>

        <hr>

						</div>
					</div>
			</div>

<?php
 include("copyfoot.php");
?>

</body>
</html>