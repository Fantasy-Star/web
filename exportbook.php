<?php require_once('Connections/mymember.php');?>
<?php
header("Content-Type:text/html;charset=utf8");
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:filename=book.xls");


mysql_select_db($database_mymember, $mymember);
//mysql_set_charset($database_mymember,'utf8');
 mysql_query("SET NAMES 'GBK'");
$result = mysql_query ( "select * from book",$mymember);
echo "FSBN\tFSBOOK\tISBN\tAUTHOR\tBNUM\tPRICE\tPUB\tBDATE\tISBOR\tBORNUM\tBSCORE\tSTORAGE\tNOTE\tINFO\n";
while ($row = mysql_fetch_array($result)){
	$text=$row[0]."\t".$row[1]."\t".$row[2]."\t".$row[3]."\t".$row[4]."\t".$row[5]."\t".$row[6]."\t".$row[7]."\t".$row[8]."\t".$row[9]."\t".$row[10]."\t".$row[11]."\t".$row[13]."\t".$row[12]."\t";
$text=str_replace("\n","",$text);
    echo $text."\n";
}
?>