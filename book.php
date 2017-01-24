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
<title><?php echo $_SESSION['webname'];?>-藏书</title>

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
function turnorderprice()
{
	var turn = document.getElementById("turnprice").value;
	if(turn=="desc"){turn="asc";}
		  else if(turn=="asc"||turn=="") {turn="desc";};
		  document.getElementById("turnprice").value = turn;   
}
function turnorderscore()
{
	var turn = document.getElementById("turnscore").value;
	if(turn=="desc"){turn="asc";}
		  else if(turn=="asc"||turn=="") {turn="desc";};
		  document.getElementById("turnscore").value = turn;   
}
</script>

</head>

<body onload="ready();">
<?php
include("topwhite.php");
?>

<div>
  <h1>藏书<small></small></h1>
  <hr>
</div>


<div id="content">
  <div id="maincontent">
  <table width="980"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top" >      
      <?php
	   
	   if(!isset($_SESSION['keyword1'])){
			    $_SESSION['keyword1']="";
				}else if(isset($_GET['keyword1'])){
			    $_SESSION['keyword1']=$_GET['keyword1'];	
			}
			
		if(!isset($_SESSION['fuhao'])){
			    $_SESSION['fuhao']=">=";
			}else if(isset($_GET['fuhao'])){
			$_SESSION['fuhao']=$_GET['fuhao'];	
		}
		
		if(!isset($_SESSION['score'])){
			    $_SESSION['score']="0";
			}else if(isset($_GET['score'])){
				if($_GET['score']=="")$_SESSION['score']=0;
				else
			$_SESSION['score']=$_GET['score'];	
		}
	   if(!isset($_SESSION['turn'])) $_SESSION['turn']="desc";
		if(isset($_POST['turn'])){
		$_SESSION['turn'] = $_POST['turn'];
		}
		
		if(!isset($_SESSION['ziduan'])) $_SESSION['ziduan']="FSBN";
		if(isset($_POST['ziduan'])){
		$_SESSION['ziduan'] = $_POST['ziduan'];
		}
	   
	   $sql=mysql_query("select count(*) as total from book where (FSBOOK like'%".$_SESSION['keyword1']."%' or AUTHOR like'%".$_SESSION['keyword1']."%' or PUB LIKE '%".$_SESSION['keyword1']."%' or FSBN LIKE '%".$_SESSION['keyword1']."%' or ISBN LIKE '%".$_SESSION['keyword1']."%' or PRICE LIKE '%".$_SESSION['keyword1']."%' or BDATE LIKE binary '%".$_SESSION['keyword1']."%' or NOTE LIKE '%".$_SESSION['keyword1']."%' or STORAGE LIKE '%".$_SESSION['keyword1']."%') and BSCORE ".$_SESSION['fuhao'].$_SESSION['score'],$mymember);
	   $info=mysql_fetch_array($sql)or die("Invalid query: " . mysql_error());

	   $total=$info['total'];
	  
	   ?>
       

      <table id="tb1" width border="1px"  bordercolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0">
      
      
      
  <!-- LAST XIUGAI -->    
      
      <tr>
      
      <form action="book.php" method="get" name="searchbook" id="searchbook" class="form-group">
      <div class=" form-inline" style="margin-top: 15px;margin-bottom: 15px;">
              <input name="keyword1" type="search" class="form-control"
              value="<?php if(isset($_SESSION['keyword1'])){echo $_SESSION['keyword1'];}?>"/>
              &nbsp;
    <label class="btn btn-inverse-hover" style="font-size: medium;">豆瓣评分</label>
   <select name="fuhao" class="form-control" form="searchbook" title="<>">
        <!--<option value=">="><></option>-->
        <option value=">=" <?php if (!(strcmp($_SESSION['fuhao'],'>='))) {echo "selected=\"selected\"";} ?>> ≥ </option>
        <option value="<=" <?php if (!(strcmp($_SESSION['fuhao'],'<='))) {echo "selected=\"selected\"";} ?>> ≤ </option>
        <option value="=" <?php if (!(strcmp($_SESSION['fuhao'],'='))) {echo "selected=\"selected\"";} ?>> = </option>
      </select>
      
      <input type="search" class="form-control" name="score"  style="width:60px;" value="<?php if(isset($_SESSION['score'])){echo $_SESSION['score'];}?>"/>

      <button formmethod="GET"  class="btn btn-inverse" onclick="form.submit()">搜索</button>
      <button type="button"  class="btn btn-inverse" onclick="location.href='exportbook.php'">导出表格</button>
      
      <?php 
		if($rs['status']>=2){
			?> 
<button class="btn btn-inverse" type="button" onclick="location.href='newbook.php'">添加新书</button>   
      <a class="btn btn-inverse" onclick="location.href='orderborrow.php'">借阅情况</a>
      <?php
		}
		?>
		</div>
           </form>
           
      </tr>
        <tr bgcolor="#111111">
          <th width="55" height="20"><div align="center"><form action="book.php" method="post" name="FSBN" id="FSBN">
          <input type="hidden" id="ziduan" name="ziduan" value="FSBN"/>
          <input type="hidden" id="turn" name="turn" value="<?php echo $_SESSION['turn'];?>"/>
          </form>        
          <div align="center"><a class="a2" href="javascript:document.FSBN.submit();" onClick="turnorder()">
社团书号</a></div></div></th>
          <th width="105"><div align="center">书名</div></th>
          <th width="130"><div align="center">ISBN</div></th> 
          <th width="100"><div align="center">作者</div></th>
          <th width="30"><div align="center">数量</div></th>
          <th width="50"><div align="center">
          <form action="book.php" method="post" name="price" id="price">
          <input type="hidden" id="ziduan" name="ziduan" value="PRICE"/>
          <input type="hidden" id="turnprice" name="turn" value="<?php echo $_SESSION['turn'];?>"/>
          </form>        
          <div align="center"><a class="a2" href="javascript:document.price.submit();" onClick="turnorderprice()">
价格</a></div>
</div></th>
          <th width="120"><div align="center">出版社</div></th>
          <th width="80"><div align="center">出版日期</div></th>
          <th width="50"><div align="center">状态</div></th>
          <th width="50"><div align="center">
          <form action="book.php" method="post" name="bscore" id="bscore">
          <input type="hidden" id="ziduan" name="ziduan" value="BSCORE"/>
          <input type="hidden" id="turnscore" name="turn" value="<?php echo $_SESSION['turn'];?>"/>
          </form>        
          <div align="center"><a class="a2" href="javascript:document.bscore.submit();" onClick="turnorderscore()">
豆瓣评分</a></div>
</div>
</th>
          <th width="50"><div align="center">保管人</div></th>
          <th width="110"><div align="center">备注</div></th>
        <?php 
		if($rs['status']>=2){
			?> 
          <th><div align="center">操作</div></th>
        <?php
		}
		?>
        </tr>
        <?php

	       $pagesize=15;
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
			 
			 
			 
             $sql1=mysql_query("select * from book where (FSBOOK like'%".$_SESSION['keyword1']."%' or AUTHOR like'%".$_SESSION['keyword1']."%' or PUB LIKE '%".$_SESSION['keyword1']."%' or FSBN LIKE '%".$_SESSION['keyword1']."%' or ISBN LIKE '%".$_SESSION['keyword1']."%' or PRICE LIKE '%".$_SESSION['keyword1']."%' or BDATE LIKE binary '%".$_SESSION['keyword1']."%' or NOTE LIKE '%".$_SESSION['keyword1']."%' or STORAGE LIKE '%".$_SESSION['keyword1']."%') and BSCORE ".$_SESSION['fuhao'].$_SESSION['score']." order by ".$_SESSION['ziduan']." ".$_SESSION['turn']." limit ".($page-1)*$pagesize.",$pagesize ",$mymember);
             while($info1=mysql_fetch_array($sql1))
		     {
		  ?>
        <tr>

          <td height="20"><div align="center"><?php echo $info1['FSBN'];?></div></td>
          <td height="20"><div align="center"><a href="bookinformation.php?FSBN=<?php echo $info1['FSBN'];?>"><?php echo $info1['FSBOOK'];?></a></div></td>
          <td height="20"><div align="center"><?php echo $info1['ISBN'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['AUTHOR'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['BNUM'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['PRICE'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['PUB'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['BDATE'];?></div></td>
          <td height="20"><div align="center">
		  <?php if (!(strcmp($info1['ISBOR'],"0"))) {echo "皆已借出";} 
           if ($info1['ISBOR']>0) {echo "在库".$info1['ISBOR']."本";} ?>
          </div></td>
          <td height="20"><div align="center"><?php 
		  if($info1['BSCORE']==0)echo "无";
		  else{
		  echo $info1['BSCORE'];}
		  ?></div></td>
          <td height="20"><div align="center"><?php echo $info1['STORAGE'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['NOTE'];?></div></td>
          <?php 
		if($rs['status']>=2){
			?> 
          <td height="20"><div align="center"><a href="bookupdate.php?id=<?php echo $info1['FSBN'];?>" class="glyphicon glyphicon-pencil"></a></div></td>
          <?php 
		}
		?>
        </tr>
        <?php
	    }
		
		?>
        <tr>
          <td height="20" colspan="13" align="center"> 
            <?php      if($total==0)
	   {
	     echo "书本们都被外星人带走啦!";
	   }
	   
	   ?>
<hr size="1" color="333333">



              <div align="center">我们的藏书共有&nbsp;<?php echo $total;?>&nbsp;本，&nbsp;
 每页显示&nbsp;<?php echo $pagesize;?>&nbsp;本。&nbsp;
              <nav>
              <ul class="pagination">
        <?php
		  if($page>=2)
		  {
		  ?>
        <li><a href="book.php?page=1" class="glyphicon glyphicon-fast-backward" title="首页"></a></li>
        <li><a href="book.php?page=<?php echo $page-1;?>" class="glyphicon glyphicon-step-backward" title="前一页"></a></li>
        <?php
		  }
		   if($pagecount<=5){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="book.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php
		     }
		   }else{
			   if($pagecount>$page+5){
		   for($i=$page;$i<=$page+5;$i++){	 
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="book.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php }}
		else{
			for($i=$pagecount-4;$i<=$pagecount;$i++){	 
		  ?>
        <li class="<?php if($i==$page){echo 'active';}?>"><a href="book.php?page=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
	<?php		
			}
		}
		?>
        <li><a href="book.php?page=<?php echo $page+1;?>" title="后一页" class="glyphicon glyphicon-step-forward"></a></li> 
        <li><a href="book.php?page=<?php echo $pagecount;?>" title="尾页" class="glyphicon glyphicon-fast-forward"></a></li>
        <?php }?>
        </ul>
        </nav>
            </div>

            </td>
        </tr>
      </table>
    <?php

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