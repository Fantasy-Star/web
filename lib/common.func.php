<?php 
function yyalert($mes){
	echo "<script>alert('{$mes}');</script>";
}
function alertMes($mes,$url){
	echo "<script>alert('{$mes}');</script>";
	echo "<script>window.location='{$url}';</script>";
}
function isLogin(){
	if(!isset($_SESSION['uID'])||($_SESSION['uID']=='')){
		echo "<script>alert('请先登录!');</script>";
		return false;
	}else{
		return true;
	}
}
