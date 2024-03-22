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
   <div class="title_right"><strong>Order management</strong></div>
   <?php
   $sql1=mysqli_query($conn,"select count(*) as total from dingdan");
	   $info1=mysqli_fetch_array($sql1);
	   $total=$info1['total'];
	   if($total==0)
	   {
	   ?>
   <table width="100%" cellPadding="6" bgcolor="#ffffff" class="table table-bordered">
  <tr bgcolor="#ffffff"><td>No content yet</td></tr></table>
   <?php
   }
  else
  {
	  
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
             $sql1=mysqli_query($conn,"select * from dingdan order by id desc limit ".($page-1)*$pagesize.",$pagesize ");
             $info1=mysqli_fetch_array($sql1);
	  
	  ?>
   <table width="100%" cellPadding="6" bgcolor="#cecece" class="table table-bordered">
     <tr>
        <td height="35" colspan="9" align="center" bgcolor="#b48c94">Order center</td>
        </tr>
	  <tr>
        <td width="121" height="35" align="center">Order number</td>
        <td width="59" align="center">User</td>
        <td width="60" align="center">Purchaser</td>
        <td width="70" align="center">Total Amount</td>
        <td width="88" align="center">Payment Method</td>
        <td width="69" align="center">Order Status</td>
        //<td width="70" align="center"></td>
        <td width="115" align="center">Action</td>
      
	  </tr>
	  <?php
	  
		    do{
			  $array=explode("@",$info1['spc']);
		      $sum=count($array)*20+260;
	  ?>
      <tr>
        <td height="35" align="center"><?php echo $info1['dingdanhao'];?></td>
        <td height="21" align="center"><?php echo $info1['xiadanren'];?></td>
        <td height="21" align="center"><?php echo $info1['shouhuoren'];?></td>
        <td height="21" align="center"><?php echo $info1['total'];?></td>
        <td height="21" align="center"><?php echo $info1['zfff'];?></td>
        <td height="21" align="center"><?php echo $info1['zt'];?></td>
        <td height="21" align="center"><?php if($info1['zt']=="Payment Received"){?>
          <a href="fahuo.php?id=<?php echo $info1['id'];?>"><input type="button" value="Ship" /></a><?php }?></td>
        <td height="21" align="center">
          <a href="dingdanedit.php?id=<?=$info1['id']?>">View Status</a>
          &nbsp;
          <a href="?id=<?=$info1['id']?>&action=del" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
	  <?php
	      }while($info1=mysqli_fetch_array($sql1))
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
&nbsp;orders,&nbsp;displaying&nbsp;<?php
 error_reporting(0);
 echo $pagesize;?>&nbsp;orders every page.&nbsp;Page&nbsp;<?php echo $page;?>&nbsp;of&nbsp;<?php echo $pagecount; ?>&nbsp;
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
	mysqli_query($conn,"delete from dingdan where id='".$id."'");
	echo "<script>alert('Delete Successfully!');location.href='dingdan.php';</script>";
}
if($action == 'tuihuo')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$spc = !empty($_GET['spc']) ? trim($_GET['spc']) : '';
	$slc = !empty($_GET['slc']) ? trim($_GET['slc']) : '';
	mysqli_query($conn,"update dingdan set th=1 where id='".$id."'");
	 $array=explode("@",$spc);
 $arraysl=explode("@",$slc);
 for($i=0;$i<count($array);$i++){
	 $id=$array[$i];
     $num=$arraysl[$i];
      mysqli_query($conn,"update shangpin set cishu=cishu-'".$num."' ,shuliang=shuliang+'".$num."' where id='".$id."'");
    }
	echo "<script>alert('Refound Successfully!');location.href='dingdan.php';</script>";
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