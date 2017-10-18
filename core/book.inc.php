<?php
//获取已借书总数量
function getTotalBorrow(){
	$sql = "select count(*) as total from borrow where ID='".$_SESSION['MM_Username']."'";
	$infoborrow=fetchOne($sql);
	$totalborrow= $infoborrow['total'];
}
