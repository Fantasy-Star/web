<?php require_once('Connections/mymember.php'); ?>

<?php
session_start();
 
echo '<html>'; 
echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';  
 
mysql_select_db($database_mymember, $mymember);

if ((isset($_GET['FSBN'])) && ($_GET['FSBN'] != "")) {
	$FSBN=$_GET['FSBN'];
  $insertSQL = sprintf("insert into orderbook (`ID`,`FSBN`) VALUES ('".$_SESSION['MM_Username']."','".$FSBN."')");

  $Result1 = mysql_query($insertSQL, $mymember) or die(mysql_error());
  
  $mark=mysql_affected_rows();//返回影响行数
if($mark>0){
 echo "<script>alert('预约成功！');window.history.back();</script>";
}else{
 echo  "<script>alert('预约失败！');history.back;</script>";
}
  $INSERTGoTo = "bookinformation.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $INSERTGoTo .= (strpos($INSERTGoTo, '?')) ? "&" : "?";
    $INSERTGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}?>