<?php require_once('Connections/mymember.php'); ?>

<?php
session_start();
 
echo '<html>'; 
echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';  
 
mysql_select_db($database_mymember, $mymember);
    $orderbook=mysql_query("select * from orderbook where OID='".$_GET['OID']."'",$mymember);
      $in=mysql_fetch_array($orderbook);
//改变书的数量
$selectbook=mysql_query("select * from book where FSBN='".$in['FSBN']."'",$mymember);
$book= mysql_fetch_array($selectbook);

  $selectmember=mysql_query("select * from member where ID='".$in['ID']."'",$mymember);
$member= mysql_fetch_array($selectmember);
if($member['BLIMIT']>0){

    if($book['ISBOR']<=0){
          echo  "<script>alert('借出失败！此书没有库存了哦！');history.back();</script>";
    }else{
      $bornum=$book['BORNUM']+1;
      $isbor=$book['ISBOR']-1;
        $booknum=mysql_query("update book set BORNUM='".$bornum."',ISBOR='".$isbor."',STORAGE='".$member['NAME']."' WHERE FSBN='".$in['FSBN']."'",$mymember);
    echo  "<script>alert('借出成功！');history.back();</script>";

  $booklimit=$member['BLIMIT'];
  $booklimit--;
  mysql_query("update member set BLIMIT='".$booklimit."' WHERE ID='".$in['ID']."'",$mymember);

    if ((isset($_GET['OID'])) && ($_GET['OID'] != "")) {
      $deleteSQL = sprintf("DELETE FROM orderbook WHERE OID='".$_GET['OID']."'");
    //insert borrow

      
      $rdate = date("Y-m-d G:H:s",strtotime("+2 months"));
      $insert=mysql_query("insert into borrow (ID,FSBN,RDATE) values('".$in['ID']."','".$in['FSBN']."','".$rdate."')",$mymember);

    //delete
      $Result1 = mysql_query($deleteSQL, $mymember) or die(mysql_error());
    }
  }
}
else{
  echo  "<script>alert('借出失败！借书限额已达上限！');history.back();</script>";
}
?>