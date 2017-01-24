<?php require_once('Connections/mymember.php'); ?>
<?php
session_start();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>幻想者-借阅情况</title>

<?php
  include("headlink.php");
  ?>


</head>
<body>
<?php
include("topwhite.php");
?>

<!-- <header id="head" style="">
  <figure style="float:left">
    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
      <div class="flipper"> <a href="http://weibo.com/u/3784345967?from=myfollow_all&is_all=1#_rnd1475328154475" target="_blank">
        <div class="front"> <img src="image/logo.png" alt="" width="150" height="150" id="logo"/> </div>
        <div class="back"> <img src="image/logo2.png" width="150" height="150" alt="" style="opacity:0.7"/> </div>
        </a> </div>
    </div>
  </figure>
  <div id="huanxiangzhe" style="height: 150px; margin-left:20px;"><img class="titlehead" src="image/borrowinfo.png" height="28" alt=""/> </div>
</header> -->
<div>
  <h1>借阅情况<small></small></h1>
  <hr>
</div>
<div class="container yunyou-background yunyou-bgblur">

<?php mysql_select_db($database_mymember, $mymember);
$booklimit = mysql_query("select BLIMIT from member WHERE ID ='".$_SESSION['MM_Username']."'", $mymember);
$member_blimit = mysql_fetch_array($booklimit);
?>
<h3>当前剩余借书限额：<?php echo $member_blimit['BLIMIT'];?> 本</h3>
<hr>
<h3 style='color:#ffffff;'>预约情况</h3>
<?php
mysql_select_db($database_mymember, $mymember);
$sql=mysql_query("select count(*) as total from orderbook where ID='".$_SESSION['MM_Username']."'",$mymember);
	@$info=mysql_fetch_array($sql);
	$total = $info['total'];
  $sqlborrow=mysql_query("select count(*) as total from borrow where ID='".$_SESSION['MM_Username']."'",$mymember);
  $infoborrow=mysql_fetch_array($sqlborrow);
  $totalborrow= $infoborrow['total'];
	if($total==0)
	{
	   echo "<h4 style='color:#ffffff;'>您暂时还没有预约记录哦！</h4>";	
	}
	else{
?>

<table width="100%">
    <tr bgcolor="#111111">
      <th height="20"><div align="center">预约单号</div></th>
      <th ><div align="center">社团书号</div></th>
      <th ><div align="center">书名</div></th> 
      <th ><div align="center">预约时间</div></th>
      <th ><div align="center">操作</div></th>
      
    </tr>
    <?php
	
     $sql1=mysql_query("select * from orderbook where ID='".$_SESSION['MM_Username']."'",$mymember);
             while($info1=mysql_fetch_array($sql1))
		     {
				 ?>
    <tr >
      <td height="20"><div align="center"><?php echo $info1['OID'];?></div></td>
      <td ><div align="center"><?php echo $info1['FSBN'];?></div></td>
      <?php
	  $sql2=mysql_query("select FSBOOK from book where FSBN='".$info1['FSBN']."'",$mymember);
      $info2=mysql_fetch_array($sql2);
      ?>
      <td ><div align="center"><a href="bookinformation.php?FSBN=<?php echo $info1['FSBN'];?>"><?php echo $info2['FSBOOK'];?></a></div></td> 
      <td ><div align="center"><?php echo $info1['OTIME'];?></div></td>
      <td ><div align="center"><a href="deleteorder.php?FSBN=<?php echo $info1['FSBN'];?>". onclick="return confirm('你确定要撤销预约吗？')">取消</a></div></td>
    </tr>
    <?php
			 }
			 ?>
    <tr>
     <td colspan="8" align="center">
     <div align="center">共有&nbsp;<?php echo $total;?>&nbsp;条预约记录</div>
     </td>
    </tr>

</table>
<?php
	}
	?>
  <hr>
  <h3 style='color:#ffffff;'>借书情况</h3>
  <?php
  if($totalborrow==0)
  {
     echo "<h4 style='color:#ffffff;'>您暂时还没有借书记录哦！</h4>"; 
  }
  else{
    ?>
<table width="100%">
<tr bgcolor="#111111">
      <th height="20"><div align="center">已借图书</div></th>
      <th ><div align="center">社团书号</div></th>
      <th ><div align="center">借书时间</div></th> 
      <th ><div align="center">还书期限</div></th>
    </tr>
    <?php
     $borrow=mysql_query("select * from borrow ",$mymember);
             while($borrowbook=mysql_fetch_array($borrow))
		     {
				 ?>
    <tr >
      <td height="20"><div align="center">
	  <?php
	  $sqlbook2=mysql_query("select FSBOOK from book where FSBN='".$borrowbook['FSBN']."'",$mymember);
      $infobook2=mysql_fetch_array($sqlbook2);
      ?>
	  <a href="bookinformation.php?FSBN=<?php echo $info1['FSBN'];?>"><?php echo $infobook2['FSBOOK'];?></a></div></td>
      <td ><div align="center"><?php echo $borrowbook['FSBN'];?></a></div></td>
      <td ><div align="center"><?php echo $borrowbook['BDATE'];?></div></td> 
      <td ><div align="center"><?php echo $borrowbook['RDATE'];?></div></td>
    </tr>
    <?php
			 }
			 ?>
    
    
    <tr>
     <td colspan="8" align="center">
     <div align="center">共有&nbsp;<?php echo $totalborrow;?>&nbsp;条借阅记录</div>
     </td>
    </tr>

</table>
<?php 
  }
  ?>

</div>
<?php
 include("copyfoot.php");
?>

</body>
</html>