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
  $MM_redirectLoginFailed = "loginfail.php";
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
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>FantasyStar</title>
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
}

.flip-container:hover .flipper, .flip-container.hover .flipper, .flip-container.flip .flipper {
  transform: rotateY(180deg);
}
.front, .back {
  backface-visibility: hidden;
  position: relative;
}

</style>


</head>

<body>
<div class="container" style="margin-bottom: 50px;">
  <div class="row">
    <div ontouchstart="this.classList.toggle('hover');">
      <div  class="col-md-12"> 
      <a href="http://weibo.com/u/3784345967?from=myfollow_all&is_all=1#_rnd1475328154475" target="_blank">
        <div > <img src="image/logo.png" alt="" width="150" height="150" id="logo"/> </div>
        </a> 

         <hr >
      </div>
    </div>
   
    </div>

  <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 yunyou-bgblur yunyou-background">
    
    <div class="" style="padding:45px 20px 20px 25px;">
      <form ACTION="<?php echo $loginFormAction; ?>" id="log" name="log" method="POST" class="form-horizontal">
      <div class="form-group">
                <div class="input-group col-sm-offset-2 col-sm-8 yunyou-bgblur">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span>&nbsp;学号</div>
                  <input name="user" id="user" type="text" autofocus required="required" class="form-control" autofocus
        placeholder="请输入您的学号" pattern="[0-9]{12}" title="学号是12位数字！" maxlength="12">
                </div>
      </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-2 col-sm-8 yunyou-bgblur">
         <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>&nbsp;密码</div>
         <input name="password" type="password" required="required" class="form-control" id="password" placeholder="请输入您的密码" pattern="^[a-zA-Z]\w{5,17}$"  title="密码" maxlength="18">
        </div>
      </div>

      <div class="form-group">

      <div class="col-sm-offset-1 col-sm-10" style="margin-top:10px; ">
        <div class="col-md-6 col-sm-6">
            <button type="submit" class="btn btn-inverse btn-block " name="login" id="login" formmethod="POST" formtarget="_self">登&nbsp;录</button>
        </div>
        <div class="col-md-6 col-sm-6">
            <button type="submit" class="btn btn-inverse btn-block " name="register"  id="register" formaction="register.php" formmethod="POST" formnovalidate>注&nbsp;册</button>
        </div>
        </div>
    </div> 

    </form>
  </div>
  </div>
</div>

<?php
 include("copyfoot.php");
?>
图源：P站画师mocha@ティアあ52b（id=648285）
</body>
</html>
