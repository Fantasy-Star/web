<?php 
require_once '../include.php';
header("Content-Type:text/html;charset=UTF-8");
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:filename=MatchMember.xls");

mysql_query("SET NAMES 'GBK'");
$sql = "select * from competition";
$rows = fetchAll($sql);
if($rows){
	echo "Fantasy Star\n";
	echo "uID\tuStuNum\tuName\tuSex\tuCollege\tuTel\tuEmail\tuClass\tsignTime\n";
	foreach ($rows as $row) {
		$uStuNum = $row['uStuNum'];
		$uSex = getSex($row['uSex']);
		$uCollege = getCollegeName($row['uCollege']);
		$text=$row['uID']."\t".$uStuNum."\t".$row['uName']."\t".$uSex."\t".$uCollege."\t".$row['uTel']."\t".$row['uEmail']."\t".$row['uClass']."\t".$row['signTime']."\t";
		$text=str_replace("\n","",$text);
		echo $text."\n";
	}
}else{
	echo "There is no data!";
}