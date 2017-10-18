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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

<style type="text/css">
.form-control{
  text-align: center;
  font-weight: normal;
}
  .form-control:read-only{
  background-color:rgba(0,0,0,0.5);
}
</style>

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
<div id="content" class="container">
  <div id="maincontent">

<div class="form-horizontal yunyou-background yunyou-bgblur" style="padding: 30px;">
  <div class="row">
    <div class="col-md-3 form-group">
      <div for="FSBN" class="col-md-6 control-label">社团书号：</div>
      <div class="col-md-6">
      <input name="FSBN" id="FSBN" type="text" value="<?php echo $info['FSBN'];?>" class="form-control" readonly>
      </div>
    </div>
    <div class="col-md-3 form-group ">
      <div for="BNUM" class="col-md-6 control-label">数量：</div>
      <div class="col-md-6 input-group">
      <input id="BNUM" name="BNUM" type="number" value="<?php echo $info['BNUM'];?>" class="form-control" readonly>
      <span class="input-group-addon">本</span>
      </div>
    </div>
    <div class=" col-md-3 form-group" for="PRICE">
      <div class="col-md-6 control-label">价格：</div>
      <div class="col-md-6 input-group">
      <input name="PRICE" id="PRICE" class="form-control" readonly="" value="<?php echo $info['PRICE'];?>">
      <span class="input-group-addon">￥</span>
      </div>
    </div>
    <div class="col-md-4 form-group ">
      <div class="col-md-4 control-label">作者：</div>
      <div class="col-md-8">
      <input name="AUTHOR" type="text" class="form-control" readonly="" value="<?php echo $info['AUTHOR'];?>">
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-3 form-group">
      <div class="control-label col-md-6">保管者：</div>
      <div class="col-md-6"><input name="STORAGE" type="text" class="form-control" readonly="" value="<?php echo $info['STORAGE'];?>"></div>
    </div>
    <div class="col-md-3 form-group">
      <div class="control-label col-md-6">剩余数量：</div>
      <div class="col-md-6 input-group">
      <input id="ISBOR" name="ISBOR" type="text" class="form-control" readonly="" value="<?php if(!(strcmp($info['ISBOR'],"0"))) {echo "皆已借出";} ?> <?php if ($info['ISBOR']>0) {echo "在库".$info['ISBOR']."本";} ?>">
      <span class="input-group-addon">本</span>
      </div>
    </div>
    <div class="col-md-3 form-group">
      <div class="control-label col-md-6">被借次数：</div>
      <div class="col-md-6 input-group">
      <input name="BORNUM" type="number" min="0" class="form-control" value="0" readonly="" value="<?php echo $info['BORNUM'];?>">
      <span class="input-group-addon">次</span>
      </div>
    </div>
    <div class=" col-md-4 form-group">
      <div class="col-md-4 control-label">ISBN：</div>
      <div class="col-md-8">
      <input name="ISBN" type="text" class="form-control" readonly="" value="<?php echo $info['ISBN'];?>">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3 form-group">
      <div class="control-label col-md-6">豆瓣评分：</div>
      <div class="col-md-6"><input name="BSCORE" type="text" class="form-control" readonly="" value="<?php 
      if($info['BSCORE']==0)echo "无";
      else{
      echo $info['BSCORE'];}
      ?>"></div>
    </div>
    <div class="col-md-5 form-group">
      <div class="control-label col-md-4">出版社：</div>
      <div class="col-md-8"><input name="PUB" type="text" class="form-control" readonly="" value="<?php echo $info['PUB'];?>"></div>
    </div>
    <div class="col-md-4 form-group">
      <div class="control-label col-md-4">出版日期：</div>
      <div class="col-md-8 input-group"><input name="BDATE" type="date" class="form-control" readonly="" value="<?php echo $info['BDATE'];?>">
      <span class="glyphicon glyphicon-calendar input-group-addon "></span>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="control-label col-md-1">备注：</div>
    <div class="col-md-11"><input name="NOTE" type="text" class="form-control" readonly="" value="<?php echo $info['NOTE'];?>"></div>
  </div>
  <hr>

    <h4>简介</h4>
    <div class="form-group" ><div name="INFO" class="form-control" style="height: auto; text-align:left;"><?php echo $info['INFO'];?></div></div>


    <div class="form-group">
      <div class="col-md-4 col-xs-4">
      <?php
          $checkorder=mysql_query("select * from orderbook where FSBN='".$FSBN."' and ID='".$_SESSION['MM_Username']."'",$mymember);
       if(@mysql_fetch_array($checkorder))
       {
       ?>
          <div align="center"><a href="deleteorder.php?FSBN=<?php echo $info['FSBN'];?>". onclick="return confirm('你确定要撤销预约吗？')"><button class="btn btn-inverse">撤销</button></a></div>   
          <?php
          }
      else{?>
          <div align="center"><a href="orderbook.php?FSBN=<?php echo $info['FSBN'];?>". onclick="return confirm('你确定要预约这本书吗？')"><button class="btn btn-inverse">预约</button></a></div>
          <?php
      }
      ?>
      </div>
      <div class="col-md-4 col-xs-4"><button type="button" class="scrollbar btn btn-inverse">评论</button></div>
      <div class="col-md-4 col-xs-4"><button type="button" class="btn btn-inverse" onClick="JavaScript:history.back(1);">返回</div>
    </div>
    
    <hr>
    <h4>评论</h4>
    <hr width="90%">
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
                     <div>
                     <form>
                     <input type="hidden" value="<?php echo $info['CID'];?>">
            <div align="left"><?php echo $info['ID'];?>:&nbsp;</div>
                    <div align="justify"><?php echo $info['COMMENT'];?></div>
            <div align="right"><a href="deletecomment.php?FSBN=<?php echo $info['FSBN'];?>&amp;CID=<?php echo $info['CID'];?>" onclick="return confirm('确定要删除这条评论吗？')"><?php if($_SESSION['MM_Username']==$info['ID']) echo "删除";?> </a>
                    &nbsp;
            <?php echo $info['CTIME'];?></div>
                    <hr>

                    </form>
                     </div>
                     <?php
             } 
                 ?>
    </div>

    <form method="POST" action="<?php echo $editFormAction; ?>" name="bookcomment">
      <div>
        <h5>不如来发表你的评论吧！</h5>
        <textarea name="COMMENT" required class="form-control" rows="5" placeholder="说说你的看法吧！" title="bookcomment" style="text-align: left;"></textarea>
      </div>
        <br>
      <div class="form-group">
        <div class="col-md-6 col-xs-6"><button type="submit" formmethod="post" class="btn btn-inverse">发表</button></div>
        <div class="col-md-6 col-xs-6"><button type="reset" class="btn btn-inverse">清空</button></div>
      </div>
       <input type="hidden" name="MM_insert" value="bookcomment">
     </form>
  </div><!-- form -->

  </div>

</div>
<?php
 include("copyfoot.php");
?>
</body>
</html>