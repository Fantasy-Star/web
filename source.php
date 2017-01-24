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
<title><?php echo $_SESSION['webname'];?>-资源</title>


<?php
  include 'headlink.php';
  ?>
<style type="text/css">
.form-control:read-only{
  background-color: rgba(0,0,0,0.5);
}
</style>
</head>

<body onload="ready();">
<?php
include("topwhite.php");

?>
<div>
  <h1>资源<small></small></h1>
  <hr>
</div>
<div id="source" class="container">

  <div class="jumbotron yunyou-background yunyou-bgblur">
    <div class="btn-group btn-group-lg" role="group">    
      <button type="button" class="btn btn-primary btn-lg" onclick="window.open('https://pan.baidu.com')">
        <!-- <a  href="https://pan.baidu.com" target="_blank"> --><span class="glyphicon glyphicon-cloud"></span><!-- </a> -->
      </button>
    
      <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#baiduyun" aria-expanded="false" aria-controls="baiduyun">
      百度网盘
      </button>
    </div>
    <div class="collapse" id="baiduyun">
    <br>
        <div class="yunyou-background yunyou-bgblur" style="margin: auto; padding:30px;">
          <form class="form-horizontal">
            <div class="form-group form-inline">
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input id="baiduuser" type="text" class="form-control input-lg" placeholder="Username" aria-describedby="basic-addon1" readonly="readonly" value="幻星科幻之科技">
              <div class="input-group-btn">
                <button id="btncopyuser" class="btn btn-primary btn-lg">复制</button>
              </div>
            </div>

            </div>
            <div class="form-group form-inline">
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input id="baidupwd" type="text" class="form-control input-lg" placeholder="Username" aria-describedby="basic-addon1" readonly="readonly" value="hxkhkjb">
              <div class="input-group-btn">
                <button id="btncopypwd" class="btn btn-primary btn-lg">复制</button>
              </div>
            </div>
            </div>
          </form>
        </div>
    </div>

  </div>
  
</div>

<script>
    $(function(){
        $("#btncopyuser").click(function(){
          copytext1();
        });
        $("#btncopypwd").click(function(){
          copytext2();
        });
    })

function copytext1()
{
var mytext=document.getElementById("baiduuser");
mytext.select(); // 选择对象
document.execCommand("Copy"); // 执行浏览器复制命令
alert("已成功复制百度网盘用户名！");
}

function copytext2()
{
var mytext=document.getElementById("baidupwd");
mytext.select(); // 选择对象
document.execCommand("Copy"); // 执行浏览器复制命令
alert("已成功复制百度网盘密码！");
}

</script>

<?php
 include("copyfoot.php");
?>

</body>
</html>