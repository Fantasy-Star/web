<?php 
require_once '../include.php';
$act=$_REQUEST['act'];
if($act==="signup"){
	$mes=CompetitionSignup();
}

if($mes){
	echo "<script type='text/javascript'>alert('".$mes."');</script>";
}
?>
<script type="text/javascript">
	window.history.back(); 
</script>