<?php require_once('Connections/mymember.php'); ?>
<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>幻想者-借阅情况</title>

<?php
  include("headlink.php");
  ?>

<style>
body {	
    font-family:"微软雅黑","幼圆", "楷体", "隶书", "华文隶书", "黑体",  "华文行楷";		
	background-color: #000000;
	background-image: url(image/back.jpg);
	background-attachment: fixed;
	background-size: cover;
	background-repeat: no-repeat;
	margin: 0;
}
#head {
	margin: auto;
	width: 480px;
	height: 150px;
	filter: drop-shadow(2px 2px 20px rgba(0,0,0,.5));
}
.flip-container, .front, .back {
	width: 150px;
	height: 150px;
	position:relative;
	top:0px;
}

/* hide back of pane during swap */
.front, .back {
	backface-visibility: hidden;
	position: absolute;
	top: 0;
	left: 0;
}
</style>

</head>
<body>
<?php
include("topwhite.php");
?>

<header id="head" style="">
  <figure style="float:left">
    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
      <div class="flipper"> <a href="http://weibo.com/u/3784345967?from=myfollow_all&is_all=1#_rnd1475328154475" target="_blank">
        <div class="front"> <img src="image/logo.png" alt="" width="150" height="150" id="logo"/> </div>
        <div class="back"> <img src="image/logo2.png" width="150" height="150" alt="" style="opacity:0.7"/> </div>
        </a> </div>
    </div>
  </figure>
  <div id="huanxiangzhe" style="height: 150px; margin-left:20px;"><img class="titlehead" src="image/borrowinfo.png" height="28" alt=""/> </div>
</header>
<hr>
<div class="content">
<?php
mysql_select_db($database_mymember, $mymember);
$sql=mysql_query("select count(*) as total from orderbook",$mymember);
	$info=mysql_fetch_array($sql);
	$total = $info['total'];
$sqlborrow=mysql_query("select count(*) as total from borrow",$mymember);
	$infoborrow=mysql_fetch_array($sqlborrow);
	$totalborrow= $infoborrow['total'];
?>
<h3 style="color:#FFFFFF;">
图书管理员界面
</h3>
<table width="800">
    <tr bgcolor="#111111">
      <th height="20"><div align="center">预约单号</div></th>
      <th ><div align="center">预约者学号</div></th>
      <th ><div align="center">预约者姓名</div></th>
      <th ><div align="center">社团书号</div></th>
      <th ><div align="center">书名</div></th> 
      <th ><div align="center">预约时间</div></th>
      <th ><div align="center">操作</div></th>
    </tr>
    <?php
     $sql1=mysql_query("select * from orderbook",$mymember);
             while($info1=mysql_fetch_array($sql1))
		     {
				 ?>
    <tr >
      <td height="20"><div align="center"><?php echo $info1['OID'];?></div></td>
      <td ><div align="center"><?php echo $info1['ID'];?></div></td>
      <td ><div align="center">
	  <?php 
	  $sqlname=mysql_query("select NAME from member where ID='".$info1['ID']."'",$mymember);
      $infoname=mysql_fetch_array($sqlname);
	  echo $infoname['NAME'];?>
      </div></td>
      <td ><div align="center"><?php echo $info1['FSBN'];?></div></td>
      <?php
	  $sqlbook=mysql_query("select FSBOOK from book where FSBN='".$info1['FSBN']."'",$mymember);
      $infobook=mysql_fetch_array($sqlbook);
      ?>
      <td ><div align="center"><a href="bookinformation.php?FSBN=<?php echo $info1['FSBN'];?>"><?php echo $infobook['FSBOOK'];?></a></div></td> 
      <td ><div align="center"><?php echo $info1['OTIME'];?></div></td>
      <td ><div align="center"><a href="borrowthisbook.php?OID=<?php echo $info1['OID'];?>" >借出</a></div></td>
    </tr>
    <?php
			 }
			 ?>
<tr>
     <td colspan="8" align="center">
     <div align="center">共有&nbsp;<?php echo $total;?>&nbsp;条预约记录</div>
     </td>
    </tr>
<hr>
</table>
<table width="800">
<tr bgcolor="#111111">
      <th height="20"><div align="center">已借图书</div></th>
      <th ><div align="center">社团书号</div></th>
      <th ><div align="center">借书者</div></th>
      <th ><div align="center">借书者学号</div></th>
      <th ><div align="center">借书时间</div></th>  
      <th ><div align="center">还书期限</div></th>
      <th ><div align="center">操作</div></th>
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
      <td ><div align="center">
	  <?php 
	  $sqlname=mysql_query("select NAME from member where ID='".$borrowbook['ID']."'",$mymember);
      $infoname=mysql_fetch_array($sqlname);
	  echo $infoname['NAME'];?>
      </div></td>
      <td ><div align="center"><?php echo $borrowbook['ID'];?></div></td>   
      <td ><div align="center"><?php echo $borrowbook['BDATE'];?></div></td> 
      <td ><div align="center"><?php echo $borrowbook['RDATE'];?></div></td>
      <td ><div align="center"><a href="returnthisbook.php?FSBN=<?php echo $borrowbook['FSBN'];?>&amp;ID=<?php echo $borrowbook['ID'];?>" >归还</a></div></td>
    </tr>
    <?php
			 }
			 ?>
    
    
    <tr>
     <td colspan="8" align="center">
     <div align="center">共有&nbsp;<?php echo $totalborrow;?>&nbsp;条借阅记录</div>
     </td>
    </tr>

<tr>
<td colspan="8" align="center">
<div align="center"><a href="#" onClick="JavaScript:history.back(1);"><img src="image/back.png"  alt=""/></a></div>
</td>
</tr>

</table>


</div>
<?php
 include("copyfoot.php");
?>

</body>
</html>