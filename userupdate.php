<?php require_once('Connections/mymember.php'); ?>
<?php
session_start();
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "thisForm")) {
  $updateSQL = sprintf("UPDATE member SET PASSWORD=%s, NAME=%s, SEX=%s, DEP=%s,TEL=%s, EMAIL=%s, ACADEMY=%s, `CLASS`=%s WHERE ID=%s",
                       GetSQLValueString($_POST['PASSWORD'], "text"),
                       GetSQLValueString($_POST['NAME'], "text"),
                       GetSQLValueString($_POST['sex'], "int"),
					             GetSQLValueString($_POST['DEP'], "int"),
                       GetSQLValueString($_POST['TEL'], "text"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['ACADEMY'], "text"),
                       GetSQLValueString($_POST['CLASS'], "text"),
                       GetSQLValueString($_POST['USERID'], "text"));

  mysql_select_db($database_mymember, $mymember);
  $Result1 = mysql_query($updateSQL, $mymember) or die(mysql_error());

  $updateGoTo = "userupdate.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>

<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}


?>
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

$colname_upuser = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_upuser = $_SESSION['MM_Username'];
}
mysql_select_db($database_mymember, $mymember);
$query_upuser = sprintf("SELECT * FROM member WHERE ID = %s", GetSQLValueString($colname_upuser, "text"));
$upuser = mysql_query($query_upuser, $mymember) or die(mysql_error());
$row_upuser = mysql_fetch_assoc($upuser);
$totalRows_upuser = mysql_num_rows($upuser);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>幻想者-个人资料</title>
<?php
  include("headlink.php");
  ?>
 <script>
function compare()
{
var a=document.getElementById('PASSWORD').value;
var b=document.getElementById('PASSWORD1').value;
if(a==b){
document.getElementById('ts').innerHTML="密码一致!";
}
else{
document.getElementById('ts').innerHTML="两次密码不一致!";
}
}

function formCheck(){ 
if(thisForm.PASSWORD.value!=thisForm.PASSWORD1.value){ 
alert( "两次输入的密码不一致，请再次输入！ "); 
var pass=document.getElementById('PASSWORD');
var pass1=document.getElementById('PASSWORD1');
pass.value="";
pass1.value="";
return false; 
} 
return true; 
}
 </script> 

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
  <div id="huanxiangzhe" style="float: right; height: 150px; "> <img class="titlehead" src="image/userinfo.png" width="218" height="28" alt=""/> </div>
  <input name="authority" type="hidden" id="authority" value="0">
</header> -->
<div>
  <h1>幻想者资料<small></small></h1>
  <hr>
</div>

<div class="container">
<div class="yunyou-bgblur yunyou-background yunyou-panel col-md-12">
  <div class="text-center col-md-12" id="title" align="center"> <h3 style="padding-bottom: 20px;">幻想者，请核实好自己的信息哦！</h3></div>
  <br>
  <div  id="maincontent">
  <form action="<?php echo $editFormAction; ?>" method="POST" id="information" name="thisForm" onsubmit="return formCheck()" class="form-horizontal">
    <div id="left" class="col-md-6">
      <div class="form-group">
        <label class="col-md-4 control-label">您的学号：</label>
        <div class="col-md-8">
        <label name="ID" type="text" class="form-control "
         title="学号不可以修改哦！" align="left"><?php echo $row_upuser['ID']; ?></label>
         <input type="hidden" name="USERID" value="<?php echo $row_upuser['ID']; ?>">
        </div>
      </div>
      <div class="form-group">
      <label class="col-md-4 control-label">您的密码：</label>
      <div class="col-md-8">
      <input name="PASSWORD" type="password" required="required" class="form-control " id="PASSWORD" placeholder="请输入密码" pattern="^[a-zA-Z]\w{5,17}$"  title="以字母开头，长度在6~18位之间，只能包含字母、数字和下划线" value="<?php echo $row_upuser['PASSWORD']; ?>" maxlength="18">
      </div>
      </div>
      <div class="form-group">
      
      <label class="col-md-4 control-label">确认密码：</label>
      <div class="col-md-8">
      <input name="PASSWORD1" type="password" required="required" class="form-control " id="PASSWORD1" placeholder="请确认密码" pattern="^[a-zA-Z]\w{5,17}$"  title="确认密码" onKeyUp="compare();" value="<?php echo $row_upuser['PASSWORD']; ?>" maxlength="18">
      
      <div id="ts" align="right"></div>
      </div>
      </div>
 
      
      <div class="form-group">
        <label class="col-md-4 control-label">您的姓名：</label>
        <div class="col-md-8">
        <input name="NAME" type="text" required="required" class="form-control" id="NAME"
        placeholder="请输入姓名" title="姓名" value="<?php echo $row_upuser['NAME']; ?>" maxlength="12">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label">您的性别：</label>     
        <div class="col-md-8 btn-group " > 
        <label class="btn btn-inverse">
        <input <?php if (!(strcmp($row_upuser['SEX'],"0"))) {echo "checked=\"checked\"";} ?> name="sex" type="radio"    value="0">未知
        </label>
        <label class="btn btn-inverse">
        <input <?php if (!(strcmp($row_upuser['SEX'],"1"))) {echo "checked=\"checked\"";} ?> name="sex" type="radio"  value="1">男
        </label>
        <label class="btn btn-inverse">
        <input name="sex" type="radio" value="2" <?php if (!(strcmp($row_upuser['SEX'],"2"))) {echo "checked=\"checked\"";} ?>>女  
        </label>
        <label class="btn btn-inverse">
        <input name="sex" type="radio"  value="3" <?php if (!(strcmp($row_upuser['SEX'],"3"))) {echo "checked=\"checked\"";} ?>>秀吉 
        </label>
        </div>   
      </div>     

    </div>
    
    <div id="right" class="col-md-6">
    <div class="form-group">
        <label class="col-md-4 control-label">联系方式：</label>
        <div class="col-md-8">
        <input name="TEL" type="tel" required="required" class="form-control" id="tel"
        placeholder="请输入联系方式" pattern="[0-9]{11}" title="啊喂，电话不是11位数字吗？" value="<?php echo $row_upuser['TEL']; ?>" maxlength="11">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label">电子邮箱：</label>
        <div class="col-md-8">
        <input name="EMAIL" type="email" required="required" class="form-control" id="email"
        placeholder="请输入电子邮箱" title="电子邮箱" value="<?php echo $row_upuser['EMAIL']; ?>"
        >
        </div>
      </div>
      <div class="form-group">
     
        <label class="col-md-4 control-label">所属学院：</label>
        <div class="col-md-8">
        <select name="ACADEMY" required class="form-control" form="information" title="请选择您所在的学院">
          <option value="" style="color:#666;
   font-size:small;"  <?php if (!(strcmp("", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>请选择您的学院</option>
          <option value="01"  <?php if (!(strcmp("01", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>商船学院</option>
          <option value="02"  <?php if (!(strcmp("02", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>物流工程学院</option>
          <option value="03"  <?php if (!(strcmp("03", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>信息工程学院</option>
          <option value="04"  <?php if (!(strcmp("04", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>海洋环境与安全工程学院</option>
          <option value="06"  <?php if (!(strcmp("06", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>交通运输学院</option>
          <option value="07"  <?php if (!(strcmp("07", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>经济管理学院</option>
          <option value="08"  <?php if (!(strcmp("08", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>外国语学院</option>
          <option value="10"  <?php if (!(strcmp("10", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>文理学院</option>
          <option value="20"  <?php if (!(strcmp("20", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>继续教育学院</option>
          <option value="00"  <?php if (!(strcmp("00", $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>我来自外星</option>
        </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label">专业班级：</label>
        <div class="col-md-8">
        <input name="CLASS" type="text" class="form-control " id="CLASS"
        placeholder="请输入您的专业和班级" title="专业班级" value="<?php echo $row_upuser['CLASS']; ?>"
        >
        </div>
      </div>   
      <div class="form-group">
        <label class="col-md-4 control-label">所属部门：</label>
        <div class="col-md-8">
        <select name="DEP" required class="form-control " form="information" title="请选择您的部门">
          <option value="0" <?php if (!(strcmp("0", $row_upuser['DEP']))) {echo "selected=\"selected\"";} ?>>我还没决定好</option>
          <option value="1"  <?php if (!(strcmp("1", $row_upuser['DEP']))) {echo "selected=\"selected\"";} ?>>小说部</option>
          <option value="2"  <?php if (!(strcmp("2", $row_upuser['DEP']))) {echo "selected=\"selected\"";} ?>>电影部</option>
          <option value="3"  <?php if (!(strcmp("3", $row_upuser['DEP']))) {echo "selected=\"selected\"";} ?>>科技部</option>
          <option value="4"  <?php if (!(strcmp("4", $row_upuser['DEP']))) {echo "selected=\"selected\"";} ?>>外联部</option>
          <option value="5"  <?php if (!(strcmp("5", $row_upuser['DEP']))) {echo "selected=\"selected\"";} ?>>行政部</option>
      </select>
      </div>
      </div>
    </div>
    
    <div class="form-group col-md-12">
        <div class="col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1">
            <button type="submit" class="btn btn-inverse btn-lg btn-block yunyou-bgblur" name="register" id="register" formmethod="POST" onclick=alert('修改完毕！')>保&nbsp;存</button>
        </div>
    </div> 


    <input type="hidden" name="MM_update" value="thisForm">
  </form>
  </div>
  </div>
</div>
<?php
 include("copyfoot.php");
?>

</body>
</html>
<?php
mysql_free_result($upuser);
?>
