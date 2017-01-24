<?php require_once('Connections/mymember.php');?>
<?php
//initialize the session
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "bookcomment")) {
  $insertSQL = sprintf("INSERT INTO bookcomment (`FSBN`,`ID`,`COMMENT`) VALUES (%s,%s,%s)",
                       GetSQLValueString($_GET['FSBN'], "int"),
					   GetSQLValueString($_SESSION['MM_Username'], "text"),
					   GetSQLValueString($_POST['COMMENT'], "text"));

  mysql_select_db($database_mymember, $mymember);
  $Result1 = mysql_query($insertSQL, $mymember) or die(mysql_error());

  $insertGoTo = "bookinformation.php";
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
<title><?php echo $_SESSION['webname'];?>-藏书</title>


<?php
  include("headlink.php");
  ?>
<script type="text/javascript">


$(document).ready(function()
  {
  $(".scrollbar").click(function(){
	   var t = $(window).scrollTop();
  //  $('body,html').animate({'scrollTop':t+300},100);
  $('body,html').animate({'scrollTop':$(document).height()},500);
  })
});
</script>


</head>

<body onload="ready();">
<?php
include("topwhite.php");
?>
  <?php
         mysql_select_db($database_mymember, $mymember);
         $FSBN=$_GET['FSBN'];
       $sql=mysql_query("select * from book where FSBN='".$FSBN."'",$mymember);
       $info=mysql_fetch_array($sql);
       
       ?>
<div>
  <h1>《<?php echo $info['FSBOOK'];?>》<small></small></h1>
  <hr>
</div>
<div id="content">
  <div id="maincontent">

  <table width="900" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="50" colspan="10" 
          style="font-size:large;font-family:'幼圆', '楷体', '隶书', '华文隶书', '黑体', '微软雅黑', '华文行楷';font-weight:bold;">
          <div align="center">书名：《<?php echo $info['FSBOOK'];?>》</div></td>
        </tr>
        <tr>
          <td width="100"><div align="RIGHT">社团书号：</div></td>
          <td width="80" ><div align="CENTER"><?php echo $info['FSBN'];?></div></td>
          <td width="80" ><div align="center">数量：</div></td>
          <td width="50" ><div align="CENTER"><?php echo $info['BNUM'];?></div></td>
          <td width="80" ><div align="center">价格：</div></td>
          <td width="80" ><div align="CENTER"><?php echo $info['PRICE'];?></div></td>
          <td width="90" ><div align="center">作者：</div></td>
          <td width="150" ><div align="CENTER"><?php echo $info['AUTHOR'];?></div></td>
          <td width="90" ><div align="center">ISBN：</div></td>
          <td width="180" ><div align="left"><?php echo $info['ISBN'];?></div></td>
        </tr>
        <tr>
          <td width ><div align="RIGHT">保管者：</div></td>
          <td width ><div align="CENTER"><?php echo $info['STORAGE'];?></div></td>
          <td width ><div >被借次数：</div></td>
          <td width ><div align="CENTER"><?php echo $info['BORNUM'];?></div></td>
          <td width ><div align="center">状态：</div></td>
          <td width ><div align="CENTER"><?php if (!(strcmp($info['ISBOR'],"0"))) {echo "皆已借出";} ?>
          <?php if ($info['ISBOR']>0) {echo "在库".$info['ISBOR']."本";} ?></div></td>   
          <td width><div >出版社：</div></td>
          <td width><div align="center"><?php echo $info['PUB'];?></div></td>
          <td width><div align="center">出版日期：</div></td>
          <td width ><div align="left"><?php echo $info['BDATE'];?></div></td>
          
          
        </tr>
        <tr>
          <td width ><div align="RIGHT">豆瓣评分：</div></td>
          <td width ><div align="CENTER">
		  <?php 
		  if($info['BSCORE']==0)echo "无";
		  else{
		  echo $info['BSCORE'];}
		  ?></div></td> 
          <td width><div align="center">备注：</div></td>
          <td colspan="7"><div align="left"><?php echo $info['NOTE'];?></div></td>
        </tr>
        <tr>
          <td height="45" colspan="10">
          <div align="center" style="font-size:large;font-family:'幼圆', '楷体', '隶书', '华文隶书', '黑体', '微软雅黑', '华文行楷';font-weight:bold;">
          简介</div></td>
        </tr>
        <tr >
          <td width="500" colspan="10" style="padding-left:40px;padding-right:40px;"><div align="left">
		  <?php echo $info['INFO'];?></div></td>
        </tr>
        <tr>
        <td colspan="10" align="center">
        
        <table width="300px" style="
	border: 1px solid rgba(0,0,0,.2);
	background-color: rgba(0,0,0,0);
	-moz-box-shadow: 0 0 0px 0px rgba(0,0,0,0);
	-webkit-box-shadow: 0 0 0px 0px rgba(0,0,0,0);
	box-shadow: 0 0 0px 0px rgba(0,0,0,0);">
          <tr>
          <td>
          <?php
          $checkorder=mysql_query("select * from orderbook where FSBN='".$FSBN."' and ID='".$_SESSION['MM_Username']."'",$mymember);
			 if(@mysql_fetch_array($checkorder))
			 {
			 ?>
          <div align="center"><a href="deleteorder.php?FSBN=<?php echo $info['FSBN'];?>". onclick="return confirm('你确定要撤销预约吗？')"><input type="image"  src="image/drawback.png"></a></div>   
          <?php
          }
		  else{?>
          <div align="center"><a href="orderbook.php?FSBN=<?php echo $info['FSBN'];?>". onclick="return confirm('你确定要预约这本书吗？')"><input type="image"  src="image/order.png"></a></div>
          <?php
		  }
		  ?>
          </td>
          
          <td>      
          <div align="center"><input type="image" src="image/comment.png" class="scrollbar"></div>
          </td>
          
          <td>
          <div align="center"><a href="#" onClick="JavaScript:history.back(1);"><img src="image/back.png"  alt=""/></a></div>
          </td>
          
          </tr>
         </table>
        </tr>
        
        <tr>
          <td height="40" colspan="10">
          <div align="center" style="font-size:large;font-family:'幼圆', '楷体', '隶书', '华文隶书', '黑体', '微软雅黑', '华文行楷';font-weight:bold;">
          评论</div>
          <hr size="1">
          </td>
        </tr>
        
        <tr>
        <td colspan="10" align="center">
        <div id="bookcomment">
<?php 
			 $sql=mysql_query("select count(*) as total from bookcomment where FSBN='".$FSBN."'",$mymember);
			 $sql1=mysql_query("select * from bookcomment where FSBN='".$FSBN."'",$mymember);
	   $info=mysql_fetch_array($sql)or die("Invalid query: " . mysql_error());
	$total=$info['total'];
	if($total==0)
	   {
	     echo "暂时还没有人评论哦!";
		 
	   }
			 
			 while($info=mysql_fetch_array($sql1))
			 {
				 ?>
                 <div style="width:800px;">
                 <form>
                 <input type="hidden" value="<?php echo $info['CID'];?>">
				<div align="left"><?php echo $info['ID'];?>:&nbsp;</div>
                <div align="justify"><?php echo $info['COMMENT'];?></div>
				<div align="right"><a href="deletecomment.php?FSBN=<?php echo $info['FSBN'];?>&amp;CID=<?php echo $info['CID'];?>" onclick="return confirm('确定要删除这条评论吗？')"><?php if($_SESSION['MM_Username']==$info['ID']) echo "删除";?> </a>
                &nbsp;
				<?php echo $info['CTIME'];?></div>
                <hr size="1">

                </form>
                 </div>
                 <?php
				 } 
             ?>

</div></td>
    </tr>
    
    <form method="POST" action="<?php echo $editFormAction; ?>" name="bookcomment">
    <tr><td height="250" colspan="10" align="center">
        <div>
      <div align="center" style="font-size:large;font-family:'幼圆', '楷体', '隶书', '华文隶书', '黑体', '微软雅黑', '华文行楷';font-weight:bold;">
      
          不如来发表你的评论吧！</div>
        <textarea name="COMMENT" required class="textarea" placeholder="说说你的看法吧！" title="bookcomment"></textarea>
        </div>
        <br>
        <div style="width:200px;">
        <div  style="float:left;"><button type="submit" formmethod="post" class="btn btn-inverse">发表</button></div>
          <div style="float:right;"><button type="reset" class="btn btn-inverse">清空</button></div>
          </div>
        
        </td> </tr>
    <input type="hidden" name="MM_insert" value="bookcomment">
        
        </form>
        
</table>


  </div>

</div>
<?php
 include("copyfoot.php");
?>
</body>
</html>