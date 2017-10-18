<?php
//参赛人员信息登记
function CompetitionSignup(){
	$arr=$_POST;
	if(insert("competition",$arr)){
		$mes = '报名成功！';
	}else{
		$mes = '报名失败！已经报名过了哦！';
	}
	return $mes;
}

//获得参赛人员信息
function getMatchMember(){
	$sql = "select * from `competition`";
	$rows = fetchAll($sql);
	return $rows;
}