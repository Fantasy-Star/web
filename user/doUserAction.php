<?php 
require_once '../include.php';
$act=$_REQUEST['act'];
switch ($act) {
	case 'loginOut':
		$mes = loginOut();
		break;
	default:
		# code...
		break;
}
if($mes){
	echo "<script type='text/javascript'>alert('".$mes."');</script>";
}
?>

<script type="text/javascript">
	window.history.back(); 
</script>