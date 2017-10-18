<?php require_once('Connections/mymember.php'); ?>

<?php
session_start();
 
echo '<html>'; 
echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';  
 
mysql_select_db($database_mymember, $mymember);
 
$result = mysql_query ( "select status from member where ID='".$_SESSION['MM_Username']."'",$mymember);
$rs = mysql_fetch_array($result);
if($rs['status']<=3)
{
    echo "<script language='javascript' charset='UTF-8'> alert('管理员才可以删除哦!');
	 window.history.back();
	 </script>";   
    exit;
}
?>

<?php
  mysql_select_db($database_mymember, $mymember);
if ((isset($_GET['FSBN'])) && ($_GET['FSBN'] != "")) {
  $deleteSQL = sprintf("DELETE FROM book WHERE FSBN='".$_GET['FSBN']."'");


  $Result1 = mysql_query($deleteSQL, $mymember) or die(mysql_error());
  
  $mark=mysql_affected_rows();//返回影响行数
if($mark>0){
 echo "<script>alert('删除成功！');window.history.back();</script>";
}else{
 echo  "<script>alert('删除失败！');history.back;</script>";
}
  $deleteGoTo = "book.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}?>