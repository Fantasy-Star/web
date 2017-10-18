<?php require_once('Connections/mymember.php'); ?>

<?php
session_start();
 
echo '<html>'; 
echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';  
 
mysql_select_db($database_mymember, $mymember);

if ((isset($_GET['WID'])) && ($_GET['WID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM yourword WHERE WID='".$_GET['WID']."'");

  $Result1 = mysql_query($deleteSQL, $mymember) or die(mysql_error());
  
  $mark=mysql_affected_rows();//返回影响行数
if($mark>0){
 echo "<script>alert('删除成功！');window.history.back();</script>";
}else{
 echo  "<script>alert('删除失败！');history.back();</script>";
}

}?>