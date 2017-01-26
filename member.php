<?php require_once('Connections/mymember.php');?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
  
  mysql_select_db($database_mymember, $mymember);
$result = mysql_query ( "select status from member where ID=".$_SESSION['MM_Username'],$mymember);
$rs = mysql_fetch_array($result);
}

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $_SESSION['webname'];?>-成员</title>


<?php
  include("headlink.php");
  ?>



<script>
function turnorder()
{
	var turn = document.getElementById("turn").value;
	if(turn=="desc"){turn="asc";}
		  else if(turn=="asc"||turn=="") {turn="desc";};
		  document.getElementById("turn").value = turn;   
}

function tijiao()
{
	document.getElementById("searchmember").submit();
}
</script>

</head>

<body onload="ready();">
<?php
include("topwhite.php");
?>

<div>
  <h1>成员<small></small></h1>
  <hr>
</div>
<div id="content">
  <div id="maincontent" class="container">
     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"  >      
      <?php

		if(!isset($_SESSION['keyword'])){
			    $_SESSION['keyword']="";
				}else if(isset($_GET['keyword'])){
			    $_SESSION['keyword']=$_GET['keyword'];	
			}
			
		if(!isset($_SESSION['sex'])){
			    $_SESSION['sex']="";
			}else if(isset($_GET['sex'])){
			$_SESSION['sex']=$_GET['sex'];	
		}
		
		if(!isset($_SESSION['department'])){
			    $_SESSION['department']="";
			}else if(isset($_GET['department'])){
			$_SESSION['department']=$_GET['department'];	
		}
		if(!isset($_SESSION['academy'])){
			    $_SESSION['academy']="";
			}else if(isset($_GET['academy'])){
			$_SESSION['academy']=$_GET['academy'];	
		}


		
		
		if(!isset($_SESSION['turn'])) $_SESSION['turn']="desc";
		if(isset($_POST['turn'])){
		$_SESSION['turn'] = $_POST['turn'];
		}
		
	   if($_SESSION['keyword']===''&&$_SESSION['department']===''&&$_SESSION['academy']===''&&$_SESSION['sex']==='')
	   {
	   $sql=mysql_query("select count(*) as total from member",$mymember);
	   }
	   else
	   {
		$sql=mysql_query("select count(*) as total from member where (ID like'%".$_SESSION['keyword']."%' or JOB like'%".$_SESSION['keyword']."%' or NAME like '%".$_SESSION['keyword']."%' or CLASS like'%".$_SESSION['keyword']."%' or TEL like'%".$_SESSION['keyword']."%' or EMAIL like'%".$_SESSION['keyword']."%') and DEP like'%".$_SESSION['department']."%' and ACADEMY like'%".$_SESSION['academy']."%' and SEX like'%".$_SESSION['sex']."%' order by ID ".$_SESSION['turn']."",$mymember);    
	   }
	   $info=mysql_fetch_array($sql)or die("Invalid query: " . mysql_error());

	   $total=$info['total'];
	   
	   ?>
       
      <table width="100%" border="1px" class="yunyou-bgblur" style="background-color: rgba(0,0,0,0.1);" bordercolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0">
      <tr>
            <td  colspan="12" align="center">
            <br>
            <form action="member.php" method="get" name="searchmember" id="searchmember" class="form-group">
     <div class="form-group form-inline">
                   <input name="keyword" type="search" class="form-control" 
              value="<?php if(isset($_SESSION['keyword'])){echo $_SESSION['keyword'];}?>"/>
    <select name="sex" class="form-control" form="searchmember" title="性别">
        <option value="">性别</option>
        <option value="0" <?php if (!(strcmp($_SESSION['sex'],'0'))) {echo "selected=\"selected\"";} ?>>未知</option>
        <option value="1" <?php if (!(strcmp($_SESSION['sex'],'1'))) {echo "selected=\"selected\"";} ?>>男</option>
        <option value="2" <?php if (!(strcmp($_SESSION['sex'],'2'))) {echo "selected=\"selected\"";} ?>>女</option>
        <option value="3" <?php if (!(strcmp($_SESSION['sex'],'3'))) {echo "selected=\"selected\"";} ?>>秀吉</option>
      </select>
      
    <select name="department" class="form-control" form="searchmember" title="搜索部门">
          <option value="" >搜索部门</option>
          <option value="0" <?php if (!(strcmp("0", $_SESSION['department']))) {echo "selected=\"selected\"";} ?>>未知</option>
          <option value="1"  <?php if (!(strcmp("1", $_SESSION['department']))) {echo "selected=\"selected\"";} ?>>小说部</option>
          <option value="2"  <?php if (!(strcmp("2", $_SESSION['department']))) {echo "selected=\"selected\"";} ?>>电影部</option>
          <option value="3"  <?php if (!(strcmp("3", $_SESSION['department']))) {echo "selected=\"selected\"";} ?>>科技部</option>
          <option value="4"  <?php if (!(strcmp("4", $_SESSION['department']))) {echo "selected=\"selected\"";} ?>>外联部</option>
          <option value="5"  <?php if (!(strcmp("5", $_SESSION['department']))) {echo "selected=\"selected\"";} ?>>行政部</option>
      </select>
      <select name="academy" class="form-control" form="searchmember" title="搜索学院">
          <option value=""  >搜索学院</option>
          <option value="01"  <?php if (!(strcmp("01", $_SESSION['academy']))) {echo "selected=\"selected\"";} ?>>商船学院</option>
          <option value="02"  <?php if (!(strcmp("02", $_SESSION['academy']))) {echo "selected=\"selected\"";} ?>>物流工程学院</option>
          <option value="03"  <?php if (!(strcmp("03", $_SESSION['academy']))) {echo "selected=\"selected\"";} ?>>信息工程学院</option>
          <option value="04"  <?php if (!(strcmp("04", $_SESSION['academy']))) {echo "selected=\"selected\"";} ?>>海洋环境与安全工程学院</option>
          <option value="06"  <?php if (!(strcmp("06", $_SESSION['academy']))) {echo "selected=\"selected\"";} ?>>交通运输学院</option>
          <option value="07"  <?php if (!(strcmp("07", $_SESSION['academy']))) {echo "selected=\"selected\"";} ?>>经济管理学院</option>
          <option value="08"  <?php if (!(strcmp("08", $_SESSION['academy']))) {echo "selected=\"selected\"";} ?>>外国语学院</option>
          <option value="10"  <?php if (!(strcmp("08", $_SESSION['academy']))) {echo "selected=\"selected\"";} ?>>文理学院</option>
          <option value="20"  <?php if (!(strcmp("20", $_SESSION['academy']))) {echo "selected=\"selected\"";} ?>>继续教育学院</option>
          <option value="00"  <?php if (!(strcmp("00", $_SESSION['academy']))) {echo "selected=\"selected\"";} ?>>我来自外星</option>
      </select>

      <button formmethod="GET"  class="btn btn-inverse" onclick="form.submit()">搜索</button>

      <button type="button"  class="btn btn-inverse" onclick="location.href='exportmember.php'">导出表格</button>
      </div>
           </form>  
        </tr>

        <tr  bgcolor="#111111" style="font-family:'幼圆', '楷体', '隶书', '华文隶书', '黑体', '微软雅黑', '华文行楷';">
        
        
          <th height="22" >
          
          <form action="member.php" method="post" name="order" id="order">
          <input type="hidden" id="turn" name="turn" value="<?php echo $_SESSION['turn'];?>"/>
          </form>
          
          <div align="center"><a class="a2" href="javascript:document.order.submit();" onClick="turnorder()">
学号</a></div>
          </th>
          <th ><div align="center">姓名</div></th>
          <th ><div align="center">性别</div></th>
          <th><div align="center">所属部门</div></th>
          <th ><div align="center">职位</div></th>
          <th ><div align="center">联系方式</div></th>
          <th ><div align="center">电子邮箱</div></th>
          <th ><div align="center">学院</div></th>
          <th ><div align="center">专业班级</div></th>
          <?php 
		if($rs['status']>=2){
			?> 
          <th><div align="center">修改</div></th>
          <th ><div align="center">删除</div></th>
          <?php
		}
		?>
        </tr>
        <?php
	       $pagesize=20;
		   if ($total<=$pagesize){
		      $pagecount=1;
			} 
			if(($total%$pagesize)!=0){
			   $pagecount=intval($total/$pagesize)+1;
			
			}else{
			   $pagecount=$total/$pagesize;			
			}
			
			if((@$_GET['page'])==""){
			    $page=1;
			
			}else{
			    $page=intval($_GET['page']);	
			}
			
			 if($_SESSION['keyword']===''&&$_SESSION['department']===''&&$_SESSION['academy']===''&&$_SESSION['sex']==='')
			 {
             $sql1=mysql_query("select * from member order by ID ".$_SESSION['turn']." limit ".($page-1)*$pagesize.",$pagesize ",$mymember);
			 }
			 else
			 {
				$sql1=mysql_query("select * from member where (ID like'%".$_SESSION['keyword']."%' or JOB like'%".$_SESSION['keyword']."%' or NAME like '%".$_SESSION['keyword']."%' or CLASS like'%".$_SESSION['keyword']."%' or TEL like'%".$_SESSION['keyword']."%' or EMAIL like'%".$_SESSION['keyword']."%') and DEP like'%".$_SESSION['department']."%' and ACADEMY like'%".$_SESSION['academy']."%' and SEX like'%".$_SESSION['sex']."%' order by ID ".$_SESSION['turn']." limit ".($page-1)*$pagesize.",$pagesize ",$mymember); 
			
			 }
             while($info1=mysql_fetch_array($sql1))
		     {
		  ?>
        <tr>
          <td height="20"><div align="center"><?php echo $info1['ID'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['NAME'];?></div></td>
          <td height="20"><div align="center">
          <?php if (!(strcmp($info1['SEX'],"0"))) {echo "未知";} ?>
          <?php if (!(strcmp($info1['SEX'],"1"))) {echo "男";} ?>
          <?php if (!(strcmp($info1['SEX'],"2"))) {echo "女";} ?>
          <?php if (!(strcmp($info1['SEX'],"3"))) {echo "秀吉";} ?>
          </div></td>
          <td height="20"><div align="center">
		  <?php if (!(strcmp($info1['DEP'],"0"))) {echo "未知";} ?>
          <?php if (!(strcmp($info1['DEP'],"1"))) {echo "小说部";} ?>
          <?php if (!(strcmp($info1['DEP'],"2"))) {echo "电影部";} ?>
          <?php if (!(strcmp($info1['DEP'],"3"))) {echo "科技部";} ?>
          <?php if (!(strcmp($info1['DEP'],"4"))) {echo "外联部";} ?>
          <?php if (!(strcmp($info1['DEP'],"5"))) {echo "行政部";} ?>
          </div></td>
          <td height="20"><div align="center"><?php echo $info1['JOB'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['TEL'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['EMAIL'];?></div></td>
          <td height="20"><div align="center">
		  <?php if (!(strcmp("01", $info1['ACADEMY']))) {echo "商船学院";} ?>
          <?php if (!(strcmp("02", $info1['ACADEMY']))) {echo "物流工程学院";} ?>
          <?php if (!(strcmp("03", $info1['ACADEMY']))) {echo "信息工程学院";} ?>
          <?php if (!(strcmp("04", $info1['ACADEMY']))) {echo "海洋环境与安全工程学院";} ?>
          <?php if (!(strcmp("06", $info1['ACADEMY']))) {echo "交通运输学院";} ?>
          <?php if (!(strcmp("07", $info1['ACADEMY']))) {echo "经济管理学院";} ?>
          <?php if (!(strcmp("08", $info1['ACADEMY']))) {echo "外国语学院";} ?>
          <?php if (!(strcmp("10", $info1['ACADEMY']))) {echo "文理学院";} ?>
          <?php if (!(strcmp("20", $info1['ACADEMY']))) {echo "继续教育学院";} ?>
          <?php if (!(strcmp("00", $info1['ACADEMY']))) {echo "我来自其他奇怪的地方";} ?></div></td>
          <td height="20"><div align="center"><?php echo $info1['CLASS'];?></div></td>
          <?php 
		if($rs['status']>=2){
			?> 
          <td height="20"><div align="center"><a href="modification.php?id=<?php echo $info1['ID'];?>" class="glyphicon glyphicon-pencil"></a></div></td>
          <td height="20"><div align="center"><a href="deletemember.php?id=<?php echo $info1['ID'];?>" class="glyphicon glyphicon-trash" onclick="return confirm('确定要删除吗？')"></a></div></td>
          <?php
		}
		?>
        </tr>
        
        <?php
	    }
		?>
        <tr>
        
        <tr>
        <td colspan="12" height=0px align="center">
		<?php  if($total==0)
	   {
	     echo "社员们都被外星人带走啦!";
	   }?></td>
       
       </tr>

       
          <td colspan="12">
          <hr>
              <div align="center">我们的小伙伴共有&nbsp;<?php echo $total;?>&nbsp;位，&nbsp;
 每页显示&nbsp;<?php echo $pagesize;?>&nbsp;位。&nbsp;
              <nav>
              <ul class="pagination">
        <?php
		  if($page>=2)
		  {
		  ?>
        <li><a href="member.php?page=1" class="glyphicon glyphicon-fast-backward" title="首页"></a></li>
        <li><a href="member.php?page=<?php echo $page-1;?>" class="glyphicon glyphicon-step-backward" title="前一页"></a></li>
        <?php
		  }
		   if($pagecount<=5){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="member.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php
		     }
		   }else{
			   if($pagecount>$page+5){
		   for($i=$page;$i<=$page+5;$i++){	 
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="member.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php }}
		else{
			for($i=$pagecount-4;$i<=$pagecount;$i++){	 
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="member.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
	<?php		
			}
		}
		?>
        <li><a href="member.php?page=<?php echo $page+1;?>" title="后一页" class="glyphicon glyphicon-step-forward"></a></li> 
        <li><a href="member.php?page=<?php echo $pagecount;?>" title="尾页" class="glyphicon glyphicon-fast-forward"></a></li>
        <?php }?>
        </ul>
        </nav>
            </div></td>
        </tr>
      </table>
      
    <?php
	//    }
		?></td>
  </tr>
</table>
     
  
  
  </div>
  
</div>
<?php
 include("copyfoot.php");
?>

</body>
</html>