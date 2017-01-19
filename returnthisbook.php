<?php require_once('Connections/mymember.php'); ?>

<?php
session_start();
 
echo '<html>'; 
echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';  
 
mysql_select_db($database_mymember, $mymember);

if ((isset($_GET['FSBN'])) && ($_GET['FSBN'] != "")) {
	$FSBN=$_GET['FSBN'];
	$ID=$_GET['ID'];
  $deleteSQL = sprintf("delete from borrow where ID ='".$ID."' and FSBN ='".$FSBN."'");

  $Result1 = mysql_query($deleteSQL, $mymember) or die(mysql_error());
  
  
    $selectbook=mysql_query("select * from book where FSBN='".$FSBN."'",$mymember);
$book= mysql_fetch_array($selectbook);


  $selectmember=mysql_query("select * from member where ID='".$ID."'",$mymember);
$member= mysql_fetch_array($selectmember);
  $booklimit=$member['BLIMIT'];
  $booklimit++;
  mysql_query("update member set BLIMIT='".$booklimit."' WHERE ID='".$ID."'",$mymember);

  $selectadmin=mysql_query("select * from member where status='3'",$mymember);
$admin= mysql_fetch_array($selectadmin);

	$isbor=$book['ISBOR']+1;
	  $booknum=mysql_query("update book set ISBOR='".$isbor."',STORAGE='".$admin['NAME']."' WHERE FSBN='".$FSBN."'",$mymember);
echo  "<script>alert('归还成功！');history.back();</script>";

}?>