<?php require_once('Connections/mymember.php'); ?>

<?php
session_start();

mysql_select_db($database_mymember, $mymember);
$result = mysql_query ( "select status from member where ID=".$_SESSION['MM_Username'],$mymember);
$rs = mysql_fetch_array($result);
if($rs['status']<=3)
 {
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'; 
    echo "<script language='javascript' charset='UTF-8'> alert('管理员才可以修改哦!');
	 window.history.back();
	 </script>";   
    exit;
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "thisForm")) {
  $updateSQL = sprintf("UPDATE member SET PASSWORD=%s, NAME=%s, SEX=%s, DEP=%s, TEL=%s, EMAIL=%s, ACADEMY=%s, `CLASS`=%s WHERE ID=%s",
                       GetSQLValueString($_POST['PASSWORD'], "text"),
                       GetSQLValueString($_POST['NAME'], "text"),
                       GetSQLValueString($_POST['SEX'], "int"),
				          	   GetSQLValueString($_POST['DEP'], "int"),
                       GetSQLValueString($_POST['TEL'], "text"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['ACADEMY'], "text"),
                       GetSQLValueString($_POST['CLASS'], "text"),
                       GetSQLValueString($_GET['id'], "text"));


  $Result1 = mysql_query($updateSQL, $mymember) or die(mysql_error());
echo "<script type='text/javascript'>";
echo "alert('修改完毕！')";

echo "</script>";
}


mysql_select_db($database_mymember, $mymember);
$query_upuser = sprintf("SELECT * FROM member WHERE ID =".$_GET['id']);
$upuser = mysql_query($query_upuser, $mymember) or die(mysql_error());
$row_upuser = mysql_fetch_assoc($upuser);
?>


<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>修改成员信息</title>
<?php
  include("headlink.php");
  ?>
 

</head>

<body>

<?php
include("topwhite.php");
?>
<div>
  <h1>修改成员信息<small></small></h1>
  <hr>
</div>

<div class="container">
<div class="yunyou-bgblur yunyou-background yunyou-panel col-md-12">
<div class="text-center col-md-12" id="title" align="center"><h3 style="padding-bottom: 20px;">成员信息</h3></div>
  <div id="maincontent">
  <form action="<?php echo $editFormAction; ?>" method="POST" id="information" name="thisForm" onsubmit="return formCheck()" class="form-horizontal">
    <div id="left" class="col-md-6">

      <div class="form-group">
                <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;您的学号</div>
        <label name="ID" type="text" class="form-control "
         title="学号不可以修改哦！" align="left"><?php echo $row_upuser['ID']; ?></label>

<script src="js/check.js"></script>

                </div>
      </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
         <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>&nbsp;您的密码</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(".passwordtip").tooltip({
      placement:'bottom'
    });
    $(".toptip").tooltip({
      placement:'top'
    });

  });

</script>

         <input name="PASSWORD" type="password" required="required" class="form-control passwordtip" id="PASSWORD" placeholder="请输入您的密码" pattern="^[a-zA-Z]\w{5,17}$"  title="以字母开头，长度在6~18位之间，只能包含字母、数字和下划线" maxlength="18" value="<?php echo $row_upuser['PASSWORD']; ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
         <div class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span>&nbsp;确认密码</div>
         <input name="PASSWORD1" type="password" required="required" class="form-control" id="PASSWORD1" placeholder="请确认您的密码" pattern="^[a-zA-Z]\w{5,17}$"  title="确认密码" oninput="compare();" maxlength="18" data-toggle="tooltip" data-placement="bottom" value="<?php echo $row_upuser['PASSWORD']; ?>">
      <div id="ts" class="input-group-addon" align="right"></div>
        </div>
      </div>
    
    <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
         <div class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;您的姓名</div>
         <input name="NAME" type="text" required="required" class="form-control" id="NAME"
        placeholder="请输入您的姓名" title="姓名" maxlength="12" value="<?php echo $row_upuser['NAME']; ?>">
        </div>
    </div>
        
    <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span>&nbsp;您的性别</div>
        <div class="btn-group " > 
        <label class="btn btn-inverse">
        <input  name="SEX" type="radio"    value="0" <?php if (!(strcmp($row_upuser['SEX'],"0"))) {echo "checked=\"checked\"";} ?>>未知
        </label>
        <label class="btn btn-inverse">
        <input  name="SEX" type="radio"  value="1" <?php if (!(strcmp($row_upuser['SEX'],"1"))) {echo "checked=\"checked\"";} ?>>男
        </label>
        <label class="btn btn-inverse">
        <input name="SEX" type="radio" value="2" <?php if (!(strcmp($row_upuser['SEX'],"2"))) {echo "checked=\"checked\"";} ?>>女  
        </label>
        <label class="btn btn-inverse">
        <input name="SEX" type="radio"  value="3" <?php if (!(strcmp($row_upuser['SEX'],"3"))) {echo "checked=\"checked\"";} ?>>秀吉 
        </label>
        </div>
        </div>
    </div>      

    </div>
    
    <div id="right" class="col-md-6">
    <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
         <div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>&nbsp;联系方式</div>
         <input name="TEL" type="tel" required="required" class="form-control" id="tel"
        placeholder="请输入联系方式" pattern="[0-9]{11}" title="啊喂，电话不是11位数字吗？" maxlength="11" value="<?php echo $row_upuser['TEL']; ?>">
        </div>
    </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>&nbsp;电子邮箱</div>
        <input name="EMAIL" type="email"  class="form-control" id="email"
        placeholder="请输入电子邮箱" title="邮箱也许有激活注册等很多作用哦！" value="<?php echo $row_upuser['EMAIL']; ?>"
        >
        </div>
      </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
        <div class="input-group-addon"><span class="glyphicon glyphicon-tower"></span>&nbsp;所属学院</div>
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
          <option value="00"  <?php if (!(strcmp(00, $row_upuser['ACADEMY']))) {echo "selected=\"selected\"";} ?>>我来自外星</option>
      </select>
      </div>
      </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
        <div class="input-group-addon"><span class="glyphicon glyphicon-tag"></span>&nbsp;专业班级</div>
        <input id="CLASS" name="CLASS" type="text" class="form-control"
        placeholder="请输入您的专业和班级" title="专业班级" value="<?php echo $row_upuser['CLASS']; ?>"
        >
      </div>   
      </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
        <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span>&nbsp;所属部门</div>
        <select name="DEP" required class="form-control" form="information" title="请选择您意向的部门">
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
            <button type="submit" class="btn btn-inverse btn-lg btn-block yunyou-bgblur" formmethod="POST">保&nbsp;存</button>
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
