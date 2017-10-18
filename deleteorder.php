<?php require_once('Connections/mymember.php'); ?>

<?php
session_start();
 
echo '<html>'; 
echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';  
 
mysql_select_db($database_mymember, $mymember);

if ((isset($_GET['FSBN'])) && ($_GET['FSBN'] != "")) {
  $deleteSQL = sprintf("DELETE FROM orderbook WHERE FSBN='".$_GET['FSBN']."' and ID='".$_SESSION['MM_Username']."'");

  mysql_select_db($database_mymember, $mymember);
  $Result1 = mysql_query($deleteSQL, $mymember) or die(mysql_error());
  
  $mark=mysql_affected_rows();//返回影响行数
if($mark>0){
 echo "<script>alert('撤销预约成功！');window.history.back();</script>";
}else{
 echo  "<script>alert('撤销预约失败！');history.back;</script>";
}
//  $deleteGoTo = "bookinformation.php";
//  if (isset($_SERVER['QUERY_STRING'])) {
//    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
//    $deleteGoTo .= $_SERVER['QUERY_STRING'];
//  }
//  header(sprintf("Location: %s", $deleteGoTo));
}?>