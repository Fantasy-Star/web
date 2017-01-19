<?php require_once('Connections/mymember.php');?>
<?php
header("Content-Type:text/html;charset=utf8");
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:filename=member.xls");


mysql_select_db($database_mymember, $mymember);
//mysql_set_charset($database_mymember,'utf8');
 mysql_query("SET NAMES 'GBK'");
$result = mysql_query ( "select * from member",$mymember);
echo "ID\tNAME\tSEX\tDEP\tJOB\tTEL\tEMAIL\tACADEMY\tCLASS\tBLIMIT\ttoken\tstatus\tregtime\n";
while ($row = mysql_fetch_array($result)){
if($row[3]==0)$sex="null";
elseif ($row[3]==1) {
	$sex="male";
}
elseif ($row[3]==2) {
	$sex="female";
}

if($row[4]==0)$dep="null";
elseif ($row[4]=="01") {
	$dep="novel";
}
elseif ($row[4]=="02") {
	$dep="movie";
}
elseif ($row[4]=="03") {
	$dep="technology";
}
elseif ($row[4]=="04") {
	$dep="association";
}
$resultcollege = mysql_query ( "select ACANAME from college where ACADEMY='".$row['ACADEMY']."'",$mymember);
$infocollege = mysql_fetch_array($resultcollege);
    echo "'".$row[0]."\t".$row[2]."\t".$sex."\t".$dep."\t".$row[5]."\t'".$row[6]."\t".$row[7]."\t".$infocollege['ACANAME']."\t".$row[9]."\t".$row[10]."\t".$row[11]."\t".$row[12]."\t'".$row[13]."\t\n";
}
echo "coderule:\n";
echo "http://it.shmtu.edu.cn/articles/117-shang-hai-hai-shi-da-xue-xue-hao-bian-ma-fang.htm";
?>