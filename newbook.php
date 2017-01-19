<?php require_once('Connections/mymember.php');?>
<?php
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
if(isset($_POST['BSCORE'])&&($_POST['BSCORE']==""))
{  $_POST['BSCORE']=0;  }
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "thisform")) {
  $insertSQL = sprintf("INSERT INTO book (FSBN, FSBOOK, ISBN, AUTHOR, BNUM, PRICE, PUB, BDATE, ISBOR, BORNUM, BSCORE, STORAGE, INFO, NOTE) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['FSBN'], "int"),
                       GetSQLValueString($_POST['FSBOOK'], "text"),
                       GetSQLValueString($_POST['ISBN'], "text"),
                       GetSQLValueString($_POST['AUTHOR'], "text"),
                       GetSQLValueString($_POST['BNUM'], "int"),
                       GetSQLValueString($_POST['PRICE'], "double"),
                       GetSQLValueString($_POST['PUB'], "text"),
                       GetSQLValueString($_POST['BDATE'], "date"),
                       GetSQLValueString($_POST['ISBOR'], "int"),
                       GetSQLValueString($_POST['BORNUM'], "int"),
                       GetSQLValueString($_POST['BSCORE'], "double"),
                       GetSQLValueString($_POST['STORAGE'], "text"),
                       GetSQLValueString($_POST['INFO'], "text"),
                       GetSQLValueString($_POST['NOTE'], "text"));

  mysql_select_db($database_mymember, $mymember);
  $Result1 = mysql_query($insertSQL, $mymember) or die(mysql_error());

  $insertGoTo = "book.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
mysql_select_db($database_mymember, $mymember);
$result = mysql_query ( "select status from member where ID=".$_SESSION['MM_Username'],$mymember);
$rs = mysql_fetch_array($result);
if($rs['status']<=2)
 {
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'; 
    echo "<script language='javascript' charset='UTF-8'> alert('图书管理员才可以添加哦!');
	 window.history.back();
	 </script>";   
    exit;
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>幻星科幻协会-添加新书</title>
<?php
  include("headlink.php");
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
}
#header {
	width: 1000px;
	height: 200px;
	margin: 0 auto;
	position: relative;
}
.blend
{	
    background:url(image/bar3.png);
	mix-blend-mode: hard-light;
}

#content {
}
#content #maincontent {
	
}

.bookstyle{
   width:!important;
   color:#FFFFFF;
}
.smallstyle{
	color:#FFFFFF;
	font-size:small;
	width:95%;
	text-align:center;
}

</style>

<script>
function samenum()
{
document.getElementById('ISBOR').value=document.getElementById('BNUM').value;
}
</script>

</head>

<body onload="ready();">
<?php
include("topwhite.php");
include("navigation.php");
?>

<div id="content">
  <div id="maincontent">
           <form action="<?php echo $editFormAction; ?>" name="thisform" method="POST">
  <table width="900" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="50" colspan="10" 
          style="font-size:large;font-family:'幼圆', '楷体', '隶书', '华文隶书', '黑体', '微软雅黑', '华文行楷';font-weight:bold;">
          <div align="center">书名：<input name="FSBOOK" type="text" required="required" class="bookstyle"></div></td>
        </tr>
        <tr>
          <td width="100"><div align="RIGHT">社团书号：</div></td>
          <td width="80" ><div align="CENTER"><input name="FSBN" type="text" class="smallstyle" value="不用填写"  readonly></div></td>
          <td width="80" ><div align="center">数量：</div></td>
          <td width="50" ><div align="CENTER"><input id="BNUM" name="BNUM" type="text" class="smallstyle" required="required" onKeyUp="samenum();"></div></td>
          <td width="80" ><div align="center">价格：</div></td>
          <td width="80" ><div align="CENTER"><input name="PRICE" type="text" class="smallstyle" ></div></td>
          <td width="90" ><div align="center">作者：</div></td>
          <td width="150" ><div align="CENTER"><input name="AUTHOR" type="text" class="smallstyle" ></div></td>
          <td width="90" ><div align="center">ISBN：</div></td>
          <td width="180" ><div align="left"><input name="ISBN" type="text" class="smallstyle" ></div></td>
        </tr>
        <tr>
          <td width ><div align="RIGHT">保管者：</div></td>
          <td width ><div align="CENTER"><input name="STORAGE" type="text" class="smallstyle" ></div></td>
          <td width ><div >被借次数：</div></td>
          <td width ><div align="CENTER"><input name="BORNUM" type="text" class="smallstyle" value="0"></div></td>
          <td width ><div align="center">剩余数量：</div></td>
          <td width ><div align="CENTER"><input id="ISBOR" name="ISBOR" type="text" class="smallstyle" ></div></td>   
          <td width><div >出版社：</div></td>
          <td width><div align="center"><input name="PUB" type="text" class="smallstyle" ></div></td>
          <td width><div align="center">出版日期：</div></td>
          <td width ><div align="left"><input name="BDATE" type="text" class="smallstyle" ></div></td>
          
          
        </tr>
        <tr>
          <td width ><div align="RIGHT">豆瓣评分：</div></td>
          <td width ><div align="CENTER"><input name="BSCORE" type="text" class="smallstyle" >
		  </div></td>
          <td width><div align="center">备注：</div></td>
          <td colspan="7"><div align="left"><input name="NOTE" type="text" class="smallstyle"></div></td>
        </tr>
        <tr>
          <td height="45" colspan="10">
          <div align="center" style="font-size:large;font-family:'幼圆', '楷体', '隶书', '华文隶书', '黑体', '微软雅黑', '华文行楷';font-weight:bold;">
          简介</div></td>
        </tr>
        <tr >
          <td width="500" colspan="10" style="padding-left:40px;padding-right:40px;"><div align="left">
		  <textarea name="INFO" class="textarea"></textarea></div></td>
        </tr>
        <tr>
          <td height="66" colspan="10" align="center">
          
          <table width="240px" style="
	border: 1px solid rgba(0,0,0,.2);
	background-color: rgba(0,0,0,0);
	-moz-box-shadow: 0 0 0px 0px rgba(0,0,0,0);
	-webkit-box-shadow: 0 0 0px 0px rgba(0,0,0,0);
	box-shadow: 0 0 0px 0px rgba(0,0,0,0);">
          <tr>
          <td >
          <div align="center"><button type="submit" formmethod="post" class="btn btn-inverse"  onclick="return confirm('确定要添加吗？')">保存</button></div></td>
          <td>
          <div  align="center"><button type="button" class="btn btn-inverse" onClick="JavaScript:location.href='book.php';">返回</div>
          </td>
          </tr>
          </table>

          </td>
        </tr>
</table>
  <input type="hidden" name="MM_insert" value="thisform">
    </form>
  </div>

</div>
<?php
 include("copyfoot.php");
?>

</body>
</html>