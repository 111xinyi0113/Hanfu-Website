<?php
include_once("top.php");
?>
<!-- 顶部 --> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>News Management</strong></div>
   <?php
   $sql=mysqli_query($conn,"select count(*) as total from news");
	   $info=mysqli_fetch_array($sql);
	   $total=$info['total'];
	   if($total==0)
	   {
	   ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff"><td>No content available at the moment</td></tr></table>
   <?php
   }
  else
  {
	  ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff">
    <th width="76%" height="24">News List</th>
    <th width="14%">Time</th>
    <th width="10%">Action</th>
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
			$page = !empty($_GET['page']) ? trim($_GET['page']) : '';
			if(($page)==""){
			    $page=1;
			
			}else{
			    $page=intval($_GET['page']);
			
			}
             $sql1=mysqli_query($conn,"select * from news order by id desc limit ".($page-1)*$pagesize.",$pagesize ");
             while($info1=mysqli_fetch_array($sql1))
		     {
		  ?>
   <tr align="middle" bgcolor="#FFFFFF" onMouseOut="mOut(this,'#FFFFFF');" onMouseOver="mOvr(this,'#DCF9B9');" style="cursor: default;">
    <td height="25" align="left">&nbsp;<SPAN> <strong><?=$info1['title']?></strong></SPAN>    </TD>
    <td height="25" align="center"><?=$info1['addtime']?></TD>
    <td align="center"><a href="newsedit.php?id=<?=$info1['id']?>">Modify</a>&nbsp;
    <a href="?id=<?=$info1['id']?>&action=del" onClick="return confirm('Are you sure you want to delete?')">Delete</a></TD>
    </tr>
<?php
	}
?>     
    </table><?php
	}
?>   
<table width="550" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center">Total&nbsp;
                  <?php
		   echo $total;
		  ?>
&nbsp;news,&nbsp;displaying&nbsp;<?php 
error_reporting(0);
echo $pagesize;?>&nbsp;news per page.&nbsp;Page&nbsp;<?php echo $page;?>&nbsp;of&nbsp;<?php echo $pagecount; ?>&nbsp;
        <a href="?page=1" title="First Page">First Page</a> <?php if($page>=2){?>
          <a href="?page=<?php echo $page-1;?>" title="Previous Page">Previous Page</a><?php } ?>
        <?php if($page+1<=$pagecount){?>
          <a href="?page=<?php echo $page+1;?>" title="Next Page">Next Page</a><?php }?>
           <a href="?page=<?php echo $pagecount;?>" title="Last Page">Last Page</a>
          </td>
        </tr>
      </table>
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php

$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	mysqli_query($conn,"delete from news where id='".$id."'");
	echo "<script>alert('Delete Successfully!');location.href='news.php';</script>";
}
include_once("foot.php");
?>
 <script>
!function(){
laydate.skin('molv');
laydate({elem: '#Calendar'});
}();
 
</script>
</body>
</html>