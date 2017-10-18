<?php 
//require_once '../include.php';
//$sql="select * from imooc_admin";
//$totalRows=getResultNum($sql);
////echo $totalRows;
//$pageSize=2;
////得到总页码数
//$totalPage=ceil($totalRows/$pageSize);
//$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
//if($page<1||$page==null||!is_numeric($page)){
//	$page=1;
//}
//if($page>=$totalPage)$page=$totalPage;
//$offset=($page-1)*$pageSize;
//$sql="select * from imooc_admin limit {$offset},{$pageSize}";
////echo $sql;
//$rows=fetchAll($sql);
////print_r($rows);
//foreach($rows as $row){
//	echo "编号：".$row['id'],"<br/>";
//	echo "管理员的名称:".$row['username'],"<hr/>";
//}
//echo showPage($page,$totalPage);
//echo "<hr/>";
//echo showPage($page,$totalPage,"cid=5&pid=6");
function showPage($page,$totalPage,$where=null,$sep="<br/><br/>"){
	$where=($where==null)?null:"&".$where;
	$p='';
	$url = $_SERVER ['PHP_SELF'];
	//首页
	$index = ($page == 1) ? "<li class='disabled'><a href='javascript:;'><span class='glyphicon glyphicon-fast-backward'></span></a></li>" : "<li><a href='{$url}?page=1{$where}'><span class='glyphicon glyphicon-fast-backward'></span></a></li>";
	//尾页
	$last = ($page == $totalPage) ? "<li class='disabled'><a href='javascript:;'><span class='glyphicon glyphicon-fast-forward'></span></a></li>" : "<li><a href='{$url}?page={$totalPage}{$where}'><span class='glyphicon glyphicon-fast-forward'></span></a></li>";
	$prevPage=($page>=1)?$page-1:1;
	$nextPage=($page>=$totalPage)?$totalPage:$page+1;
	//上一页
	$prev = ($page == 1) ? "<li class='disabled'><a href='javascript:;'><span class='glyphicon glyphicon-step-backward'></span></a></li>" : "<li><a href='{$url}?page={$prevPage}{$where}'><span class='glyphicon glyphicon-step-backward'></span></a></li>";
	//下一页
	$next = ($page == $totalPage) ? "<li class='disabled'><a href='javascript:;'><span class='glyphicon glyphicon-step-forward'></span></a></li>" : "<li><a href='{$url}?page={$nextPage}{$where}'><span class='glyphicon glyphicon-step-forward'></span></a></li>";
	//$str = "共{$totalPage}页";
	///当前是第{$page}页
	for($i = 1; $i <= $totalPage; $i ++) {
		//当前页无连接
		if ($page == $i) {
			$p .= "<li class='active'><a href='javascript:;'>{$i}</a></li>";
		} else {
			$p .= "<li><a href='{$url}?page={$i}{$where}'>{$i}</a></li>";
		}
	}
	//$str.$sep.
 	$pageStr=$index.$prev.$p.$next.$last;
 	return $pageStr;
}