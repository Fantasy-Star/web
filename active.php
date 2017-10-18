<?php
include_once("Connections/mymember.php");
 
$verify = stripslashes(trim($_GET['verify'])); 
 
$query = mysql_query("select ID from member where status in('0','1') and  
`token`='$verify'"); 

?>
<!doctype html>
<html>
<head>
	<script type="text/javascript"> 
function closeMyWindow() { 
window.setTimeout("window.close()", 1000); 
} 
</script> 
<meta charset="utf-8">
<title>激活账户</title>
</head>

<body>
<?php
$row = mysql_fetch_array($query); 
if($row){ 
        mysql_query("update member set status=1 where ID=".$row['ID']); 
        $msg = '激活成功！'; 
		echo "<script>closeMyWindow();</script>" ;
}else{ 
    $msg = '账户不存在，请重新注册.当前窗口将在三秒后自动关闭。';  
	echo "<script>closeMyWindow();</script>" ;
} 
echo $msg; 
?>

</body>
</html>