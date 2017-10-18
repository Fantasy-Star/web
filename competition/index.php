<?php 
require_once '../include.php';
$AssociationName='幻星科幻协会';
$Competition='第九届上海高校幻想节-海事赛场';
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $Competition; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" media="screen" />
	<link rel="Bookmark" href="../favicon.ico" >
	<link rel="stylesheet" href="../css/yunyoustyle.css">
	<link rel="stylesheet" href="../css/yunyou-input-group.css">

	<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
</head>
<body>
	<?php
	include("../common/navbar.php");
	?>
	<div class="container">
		<div class="col-md-1 col-md-offset-2 text-center col-sm-12">
		<a href="introduce.php">
			 <img src="../image/matchImage/ninthLogo.png" alt="..." height="72px">
		</a>
		</div>
		<div class="col-md-8 col-sm-12 text-center">
			<h1 class="" style="font-family: 方正经黑简体,华文行楷;text-shadow: 0px 0px 7px 2px #000;">第九届上海高校幻想节
				<small style="color: #fff;">— 海事赛区
				<a href="introduce.php"><small style="color: #fff;"> - 更多介绍</small></a>
				</small> 
			</h1>
		</div>
	</div>
	
	<hr>

	<div class="container">
		<div class="yunyou-background yunyou-panel col-md-12 yunyou-bgblur">
			<div id='myalert' class='form-group' style='display:none;'>
				<div class='alert alert-warning  col-sm-offset-2 col-sm-8'>
					<a href='#' class='close' data-dismiss='alert'>
						&times;   </a>
						<strong>警告！</strong>您的学号已经报名过啦！是不是被外星人抹去了记忆?
					</div>
				</div>
				<div class="text-center" id="title" align="center">
					<h3 class="text-center">幻想者，请认真登记自己的参赛信息哦！</h3>
				</div>
				<hr>
				<div id="maincontent">
					<form action="doCompetitionAction.php?act=signup" method="POST" id="information" class="form-horizontal" >
						<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1" >
							<div class="form-group">
								<div class="input-group yunyou-bgblur">
									<div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;您的学号</div>
									<input name="uStuNum" type="text" autofocus required="required" class="form-control" id="userid"
									placeholder="请输入您的学号" pattern="[0-9]{12}" title="学号是12位数字！" maxlength="12" oninput="">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group yunyou-bgblur">
									<div class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;您的姓名</div>
									<input name="uName" type="text" required="required" class="form-control" id="NAME"
									placeholder="请输入您的姓名" title="姓名" maxlength="12">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group yunyou-bgblur">
									<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span>&nbsp;您的性别</div>
									<div class="btn-group btn-group-justified" > 
										<label class="btn btn-inverse">
											<input  name="uSex" type="radio"  value="0">未知
										</label>
										<label class="btn btn-inverse">
											<input  name="uSex" type="radio"  value="1">男
										</label>
										<label class="btn btn-inverse">
											<input name="uSex" type="radio" value="2">女  
										</label>
										<label class="btn btn-inverse">
											<input name="uSex" type="radio"  value="3">秀吉 
										</label>
									</div>
								</div>
							</div>      

							<div class="form-group">
								<div class="input-group yunyou-bgblur">
									<div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>&nbsp;联系方式</div>
									<input name="uTel" type="tel" required="required" class="form-control" id="tel"
									placeholder="请输入联系方式" pattern="[0-9]{11}" title="啊喂，电话不是11位数字吗？" maxlength="11">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group yunyou-bgblur">
									<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>&nbsp;电子邮箱</div>
									<input name="uEmail" type="email" required="required" class="form-control" id="email"
									placeholder="请输入电子邮箱" title="邮箱也许有激活注册等很多作用哦！"
									>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group yunyou-bgblur">
									<div class="input-group-addon"><span class="glyphicon glyphicon-tower"></span>&nbsp;所属学院</div>
									<select name="uCollege" required class="form-control" form="information" title="请选择您所在的学院">
										<option value="">请选择您的学院</option>
									<?php $AllCollege = getAllCollege();
										foreach ($AllCollege as $College):
									?>			
										<option value="<?php echo $College['ACADEMY'];?>"><?php echo $College['ACANAME'];?></option>
									<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group yunyou-bgblur">
									<div class="input-group-addon"><span class="glyphicon glyphicon-tag"></span>&nbsp;专业班级</div>
									<input id="CLASS" name="uClass" type="text" class="form-control"
									placeholder="请输入您的专业和班级" title="专业班级"
									>
								</div>   
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-inverse btn-lg btn-block" id="register">
								<span class="glyphicon glyphicon-hourglass"></span>
									&nbsp;&nbsp;报&nbsp;名
								</button>
							</div>

						</div>

					</form>
				</div>
			</div>
		</div>
<?php 
include("../common/footer.php");
?>
	</body>
	</html>