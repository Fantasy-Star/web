<?php
function loginOut(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	session_destroy();
	$mes='退出成功';
	return $mes;
}

//获得学院名称
function getCollegeName($ACADEMY){
	$sql = "select * from college where ACADEMY='".$ACADEMY."'";
	$result = fetchOne($sql);
	return $result['ACANAME'];
}
//得到学院信息
function getAllCollege(){
	$sql = "select * from college";
	$rows = fetchAll($sql);
	return $rows;
}

//获得性别
function getSex($SexID){
	$sql = "select * from usex where SexID='".$SexID."'";
	$result = fetchOne($sql);
	return $result['SexName'];
}
