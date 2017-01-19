<?php
 if($_GET["id"]){
   // sleep(1);
    require_once('../Connections/mymember.php'); 
    mysql_select_db($database_mymember, $mymember);
$result = mysql_query ( "select * from member WHERE ID=".$_GET['id'],$mymember);
  $rs=@mysql_fetch_array($result);




    if($rs){
      echo "<span id='exist' class='glyphicon glyphicon-warning-sign' title='学号已经存在'></span>"; 
    }else {
      echo "<span class=' glyphicon glyphicon-ok' title='学号可以注册''></span>"; 
    }
 }  
?>
