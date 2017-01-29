<?php require_once('Connections/mymember.php');
include_once('Connections/smtp.class.php'); 
/*require_once('Connections/class.phpmailer.php');*/
//require_once("Connections/class.smtp.php"); 
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

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
 $MM_dupKeyRedirect="register.php";
  $loginUsername = $_POST['ID'];
  $LoginRS__query = sprintf("SELECT ID FROM member WHERE ID=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_mymember, $mymember);
  $LoginRS=mysql_query($LoginRS__query, $mymember);
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
  //  append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
 //   header ("Location: $MM_dupKeyRedirect");


  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "thisForm")) {

$username = $_POST['ID'];
$password = md5(trim($_POST['PASSWORD'])); 
$regtime= date("Y-m-d H:i:s",time());

$token=md5($username.$password.$regtime);

$email=trim($_POST['EMAIL']);
	
  $insertSQL = sprintf("INSERT INTO member (ID, PASSWORD, NAME, SEX, DEP,TEL, EMAIL, ACADEMY, `CLASS`,token,regtime) VALUES (%s, %s, %s, %s,%s, %s, %s, %s, %s,%s,%s)",
                       GetSQLValueString($_POST['ID'], "text"),
                       GetSQLValueString($_POST['PASSWORD'], "text"),
                       GetSQLValueString($_POST['NAME'], "text"),
                       @GetSQLValueString($_POST['SEX'], "int"),
					             GetSQLValueString($_POST['DEP'], "int"),
                       GetSQLValueString($_POST['TEL'], "text"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['ACADEMY'], "text"),
                       GetSQLValueString($_POST['CLASS'], "text"),
					   GetSQLValueString($token, "text"),
					   GetSQLValueString($regtime, "text")				 );

  mysql_select_db($database_mymember, $mymember);
  $Result1 = mysql_query($insertSQL, $mymember);

 /*?>if($Result1){ 
//email send

//$mail  = new PHPMailer(); 
//$mail->CharSet    ="UTF-8";                 //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置为 UTF-8
//$mail->IsSMTP();                            // 设定使用SMTP服务
//$mail->SMTPAuth   = true;                   // 启用 SMTP 验证功能
//$mail->SMTPSecure = "ssl";                  // SMTP 安全协议
//$mail->Host       = "smtp.163.com";       // SMTP 服务器
//$mail->Port       = 994;                    // SMTP服务器的端口号
//$mail->Username   = "smuhxxh@163.com";  // SMTP服务器用户名
//$mail->Password   = "smuhxkhxh";        // SMTP服务器密码
//
//$mail->SetFrom("smuhxxh@163.com", "幻星科幻协会");    // 设置发件人地址和名称
//$mail->AddReplyTo("smuhxxh@163.com","幻想者"); 
//
//$mail->Subject    = "幻星帐号激活";                     // 设置邮件标题
//$mail->AltBody    = "为了查看该邮件，请切换到支持 HTML 的邮件客户端"; 
//$mail->IsHTML ( true ); 
//                                            // 可选项，向下兼容考虑
//$mail->MsgHTML("幻想者".$username."号：<br/>欢迎加入我们幻星大家庭。<br/>请点击链接激活您的幻星帐号吧。<br/> 
//	<a href='http://localhost:8080/FantasyStars/active.php?verify=".$token."' target= 
//'_blank'>http://localhost:8080/FantasyStars/active.php?verify=".$token."</a><br/> 
//    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问。");                         // 设置邮件内容
//$mail->AddAddress($email);
////$mail->AddAttachment("images/phpmailer.gif"); // 附件 
//$mail->Send();
//if(!$mail->Send()) {
//    echo "发送失败：" . $mail->ErrorInfo;
//} else {
//    echo "恭喜，邮件发送成功！";
//}
//}
    $smtpserver = "smtp.163.com"; //SMTP服务器，如：smtp.163.com 
    $smtpserverport = 25; //SMTP服务器端口，一般为25 
    $smtpusermail = "smuhxxh@163.com"; //SMTP服务器的用户邮箱，如xxx@163.com 
    $smtpuser = "smuhxxh@163.com"; //SMTP服务器的用户帐号xxx@163.com 
    $smtppass = "smuhxkhxh"; //SMTP服务器的用户密码 
    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //实例化邮件类 
    $emailtype = "HTML"; //信件类型，文本:text；网页：HTML 
    $smtpemailto = $email; //接收邮件方，本例为注册用户的Email 
    $smtpemailfrom = $smtpusermail; //发送邮件方，如xxx@163.com 
    $emailsubject = "幻星帐号激活";//邮件标题 
    //邮件主体内容 
	
	//***************记得改域名！！！！
    $emailbody = "幻想者".$username."号：<br/>欢迎加入我们幻星大家庭。<br/>请点击链接激活您的幻星帐号吧。<br/> 
	<a href='http://localhost:8080/FantasyStars/active.php?verify=".$token."' target= 
'_blank'>http://localhost:8080/FantasyStars/active.php?verify=".$token."</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问。".
	
	
	"
	<a href='http://www.yunyoujun.idcnet.top/active.php?verify=".$token."' target= 
'_blank'>http://www.yunyoujun.idcnet.top/active.php?verify=".$token."</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问。"
	
		; 	
//    //发送邮件 
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype); 
    if($rs==1){ 
        $msg = '恭喜您，注册成功！<br/>快登陆看看吧！';     
    }else{ 
        $msg = $rs;     
    } 
} 
echo $msg; 

<?php */

  $insertGoTo = "regok.php";
  if ($Result1) {
  header(sprintf("Location: %s", $insertGoTo));
  }

}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>幻想者，加入我们吧！</title>
<?php
  include("headlink.php");
  ?>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: rgba(0,0,0,0.5);">
  <div class="container-fluid"> 

    <div class="navbar-header ">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#"><span> 欢迎你,幻想者。 </span></a>

      </div>

    <div class="collapse navbar-collapse" id="defaultNavbar1"  style="font-size:large;">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">登录</a></li>
        <li><a href="register.php">注册</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<!-- <header id="head" style="">
  <figure style="float:left">
    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
      <div class="flipper"> <a href="http://weibo.com/u/3784345967?from=myfollow_all&is_all=1#_rnd1475328154475" target="_blank">
        <div class="front"> <img src="image/logo.png" alt="" width="150" height="150" id="logo"/> </div>
        <div class="back"> <img src="image/logo2.png" width="150" height="150" alt="" style="opacity:0.7"/> </div>
        </a> </div>
    </div>
  </figure>
  <div id="huanxiangzhe" style="float: right; height: 150px; "> <img class="titlehead" src="image/registerhead.png" width="218" height="28" alt=""/> </div>
  <input name="authority" type="hidden" id="authority" value="0">
</header> -->
<div>
  <h1>幻想者登记<small></small></h1>
  <hr>
</div>


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
var pass=document.getElementById('PASSWORD').value;
var pass1=document.getElementById('PASSWORD1').value;
pass.value="";
pass1.value="";
return false; 
} 
if(document.getElementById("exist")){
  alert( "学号已经存在！是不是被外星人抹去了记忆?请联系管理员！"); 
  document.getElementById('myalert').style.display='';
  return false;
}

return true; 
}
 </script>

<div class="container">
<div class="yunyou-bgblur yunyou-background yunyou-panel col-md-12">
<div id='myalert' class='form-group' style='display:none;'>
<div class='alert alert-warning  col-sm-offset-2 col-sm-8'>
   <a href='#' class='close' data-dismiss='alert'>
      &times;   </a>
   <strong>警告！</strong>您的学号已经注册过了！是不是被外星人抹去了记忆?请联系管理员！</div>
</div>
  <div class="text-center col-md-12" id="title" align="center"><h3 style="padding-bottom: 20px;">幻想者，请认真登记自己的信息哦！</h3></div>
    <br>
  <div id="maincontent">
  <form action="<?php echo $editFormAction; ?>" method="POST" id="information" name="thisForm" onsubmit="return formCheck()" class="form-horizontal">
    <div id="left" class="col-md-6">

      <div class="form-group">
                <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
                  <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;您的学号</div>
                  <input name="ID" type="text" autofocus required="required" class="form-control" id="userid"
        placeholder="请输入您的学号" pattern="[0-9]{12}" title="学号是12位数字！" maxlength="12" onblur="funtest100()">

<script src="js/check.js"></script>

        <div class="input-group-addon" id="useridSpan"></div>  
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

         <input name="PASSWORD" type="password" required="required" class="form-control passwordtip" id="PASSWORD" placeholder="请输入您的密码" pattern="^[a-zA-Z]\w{5,17}$"  title="以字母开头，长度在6~18位之间，只能包含字母、数字和下划线" maxlength="18" >
        </div>
      </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
         <div class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span>&nbsp;确认密码</div>
         <input name="PASSWORD1" type="password" required="required" class="form-control" id="PASSWORD1" placeholder="请确认您的密码" pattern="^[a-zA-Z]\w{5,17}$"  title="确认密码" oninput="compare();" maxlength="18" data-toggle="tooltip" data-placement="bottom">
      <div id="ts" class="input-group-addon" align="right"></div>
        </div>
      </div>
    
    <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
         <div class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;您的姓名</div>
         <input name="NAME" type="text" required="required" class="form-control" id="NAME"
        placeholder="请输入您的姓名" title="姓名" maxlength="12">
        </div>
    </div>
        
    <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span>&nbsp;您的性别</div>
        <div class="btn-group " > 
        <label class="btn btn-inverse">
        <input  name="SEX" type="radio"    value="0">未知
        </label>
        <label class="btn btn-inverse">
        <input  name="SEX" type="radio"  value="1">男
        </label>
        <label class="btn btn-inverse">
        <input name="SEX" type="radio" value="2">女  
        </label>
        <label class="btn btn-inverse">
        <input name="SEX" type="radio"  value="3">秀吉 
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
        placeholder="请输入联系方式" pattern="[0-9]{11}" title="啊喂，电话不是11位数字吗？" maxlength="11">
        </div>
    </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>&nbsp;电子邮箱</div>
        <input name="EMAIL" type="email" required="required" class="form-control" id="email"
        placeholder="请输入电子邮箱" title="邮箱也许有激活注册等很多作用哦！"
        >
        </div>
      </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
        <div class="input-group-addon"><span class="glyphicon glyphicon-tower"></span>&nbsp;所属学院</div>
        <select name="ACADEMY" required class="form-control" form="information" title="请选择您所在的学院">
          <option value="">请选择您的学院</option>
          <option value="01">商船学院</option>
          <option value="02">物流工程学院</option>
          <option value="03">信息工程学院</option>
          <option value="04">海洋环境与安全工程学院</option>
          <option value="06">交通运输学院</option>
          <option value="07">经济管理学院</option>
          <option value="08">外国语学院</option>
          <option value="10">文理学院</option>
          <option value="20">继续教育学院</option>
          <option value="00">我来自其他奇怪的地方</option>
      </select>
      </div>
      </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
        <div class="input-group-addon"><span class="glyphicon glyphicon-tag"></span>&nbsp;专业班级</div>
        <input id="CLASS" name="CLASS" type="text" class="form-control"
        placeholder="请输入您的专业和班级" title="专业班级"
        >
      </div>   
      </div>
      <div class="form-group">
        <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
        <div class="input-group-addon"><span class="glyphicon glyphicon-star"></span>&nbsp;意向部门</div>
        <select name="DEP" required class="form-control" form="information" title="请选择您意向的部门">
          <option value="">请选择您的意向部门</option>
          <option value="0">我还没决定好</option>
          <option value="1">小说部</option>
          <option value="2">电影部</option>
          <option value="3">科技部</option>
          <option value="4">外联部</option>
          <option value="5">行政部</option>
      </select>
      </div>
      </div>
    </div>
    
    <div class="form-group col-md-12">
        <div class="col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1">
            <button type="submit" class="btn btn-inverse btn-lg btn-block yunyou-bgblur" name="register" id="register" formmethod="POST">注&nbsp;册</button>
        </div>
    </div> 
    <input type="hidden" name="MM_insert" value="thisForm">
  </form>
  </div>
</div>
<?php
 include("copyfoot.php");
?>
图源：P站画师mocha@ティアあ52b（id=648285）
</body>
</html>