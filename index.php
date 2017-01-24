<?php require_once('Connections/mymember.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user'])) {
  $loginUsername=$_POST['user'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "welcome.php";

  $MM_redirecttoReferrer = false;
  mysql_select_db($database_mymember, $mymember);
  
  $LoginRS__query=sprintf("SELECT ID, PASSWORD FROM member WHERE ID=%s AND PASSWORD=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $mymember) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
  if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;       

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];  
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    echo "<div id='myalert' class='form-group' style='display:none;'>
<div class='alert alert-warning  col-sm-offset-2 col-sm-8'>
   <a href='#' class='close' data-dismiss='alert'>
      &times;   </a>
   <strong>警告！</strong>您的学号或密码错误！</div>
</div>";
echo "<script type='text/javascript'>";
echo "document.getElementById('myalert').style.display='';";

echo "</script>";
  }
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>FantasyStar-幻星科幻协会</title>
<?php
  include("headlink.php");
  ?>

<style type="text/css">
body {  
  padding-top: 30px;
}
</style>


</head>

<body>
<div class="container">
  <div class="row">
      <div  class="col-md-12"> 
        <div ><a href="http://weibo.com/u/3784345967?from=myfollow_all&is_all=1#_rnd1475328154475" target="_blank"><img class="img-rounded" src="image/logo.png" alt=""  id="logo"/></a></div>

         <hr >
      </div>
   
    </div>

  <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 yunyou-bgblur yunyou-background">

    
  <div class="" style="padding:30px 20px 20px 20px;margin:0px 5px 0px 5px;">
      <form ACTION="<?php echo $loginFormAction; ?>" id="log" name="log" method="POST" class="form-horizontal">



      <div class="form-group">
              <div class="input-group col-sm-12 yunyou-bgblur">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span>&nbsp;学号</div>

      <script src="js/checkforlogin.js"></script>

                <input name="user" id="userid" type="text" autofocus required="required" class="form-control" autofocus
        placeholder="请输入您的学号" pattern="[0-9]{12}" title="学号是12位数字！" maxlength="12" onblur="funtest100()">

                <div class="input-group-addon" id="useridSpan"><span  class='glyphicon glyphicon-info-sign'></span></div>  
              </div>
      </div>
      <div class="form-group">
        <div class="input-group col-sm-12 yunyou-bgblur">
         <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>&nbsp;密码</div>
         <input name="password" type="password" required="required" class="form-control" id="password" placeholder="请输入您的密码" pattern="^[a-zA-Z]\w{5,17}$"  title="密码至少六位！" maxlength="18">
         <div class="input-group-addon" id="PASSWORDTIP"><span  class='glyphicon glyphicon-asterisk'></span></div>
        </div>
      </div>

<script type="text/javascript">
//<![CDATA[
function  detectCapsLock(event){
    var e = event||window.event;
    var o = e.target||e.srcElement;
    var keyCode  =  e.keyCode||e.which; // 按键的keyCode 
    var isShift  =  e.shiftKey ||(keyCode  ==   16 ) || false ; // shift键是否按住
     if (
     ((keyCode >=   65   &&  keyCode  <=   90 )  &&   !isShift) // Caps Lock 打开，且没有按住shift键 
     || ((keyCode >=   97   &&  keyCode  <=   122 )  &&  isShift)// Caps Lock 打开，且按住shift键
     ){document.getElementById('PASSWORDTIP').innerHTML = "<span class='glyphicon glyphicon-font' title='大写锁定已开启'></span>";}
     else{document.getElementById('PASSWORDTIP').innerHTML = "<span  class='glyphicon glyphicon-asterisk' title='小写键盘输入'></span>";} 

}
document.getElementById('password').onkeypress = detectCapsLock;
//]]>
</script> 


    
  <div class="col-md-12">
  <div class="form-group">
        <div class="col-md-6 col-sm-6"  style="margin-top:8px;margin-bottom: 8px;">
            <button type="submit" class="btn btn-inverse btn-block " name="login" id="login" formmethod="POST" formtarget="_self">登&nbsp;录</button>
        </div>
        <div class="col-md-6 col-sm-6"  style="margin-top:8px;margin-bottom: 8px;">
            <button type="submit" class="btn btn-inverse btn-block " name="register"  id="register" formaction="register.php" formmethod="POST" formnovalidate>注&nbsp;册</button>
        </div>
  </div>
  </div>
    

    </form>
  </div>
  </div>
  <!--row-->
</div>

<?php
 include("copyfoot.php");
?>
</body>
</html>
