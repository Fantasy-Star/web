<?php 
require_once '../include.php';
$AssociationName='幻星科幻协会';
$Competition='第九届上海高校幻想节-海事赛场';

$MatchMembers = getMatchMember();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $Competition; ?></title>
	<?php include('../common/headlink.html');?>
	<link rel="stylesheet" type="text/css" href="../css/yunyou-table.css">
</head>
<body>
	<?php
	include("../common/navbar.php");
	?>
	<div class="container">
		<div class="col-md-1 col-md-offset-2 text-center col-sm-12">
			<img src="../image/matchImage/ninthLogo.png" alt="..." height="72px">
		</div>
		<div class="col-md-8 col-sm-12 text-center">
			<h1 class="" style="font-family: 方正经黑简体,华文行楷;text-shadow: 0px 0px 7px 2px #000;">第九届上海高校幻想节
				<small style="color: #fff;">— 海事赛区</small> 
			</h1>
		</div>
	</div>
	
	<hr>

	<div class="container">
		<div class="yunyou-background yunyou-panel col-md-12 yunyou-bgblur">
			<div class="text-center" id="title" align="center">
				<h3 class="text-center">参赛人员信息</h3>
			</div>
			<hr>
			<div class="form-group text-center">
			    <button type="button"  class="btn btn-inverse" onclick="window.location.href='exportMatchMember.php';">导出表格</button>
			</div>
			<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>学号</th>
						<th>姓名</th>
						<th>性别</th>
						<th>学院</th>
						<th>联系方式</th>
						<th>电子邮箱</th>
						<th>专业班级</th>
						<th>报名时间</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($MatchMembers as $MatchMember):?>
					<tr>
						<td><?php echo $MatchMember['uStuNum']; ?></td>
						<td><?php echo $MatchMember['uName']; ?></td>
						<td><?php echo getSex($MatchMember['uSex']); ?></td>
						<td><?php echo getCollegeName($MatchMember['uCollege']); ?></td>
						<td><?php echo $MatchMember['uTel']; ?></td>
						<td><?php echo $MatchMember['uEmail']; ?></td>
						<td><?php echo $MatchMember['uClass']; ?></td>
						<td><?php echo $MatchMember['signTime']; ?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<?php 
	include("../common/footer.php");
	?>
</body>
</html>